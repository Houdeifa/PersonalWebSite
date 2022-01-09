function HoverFunction(IncludeName,classTest=false,activeSet=false){
    var pNavElements = document.getElementsByClassName("p-navUL");
    for (let i = 0; i < pNavElements.length; i++) {
        if(classTest){
            if(pNavElements[i] != null && pNavElements[i].classList.contains(IncludeName)){
                pNavElements[i].classList.add("sel");
                bgSpan = pNavElements[0].getElementsByTagName("span");
                bgSpan[0].style.top = pNavElements[i].offsetHeight*i + "px";
            }
            else{
                pNavElements[i].classList.remove("sel");
            }
        }else{
            if(pNavElements[i] != null && pNavElements[i].id ==IncludeName){
                pNavElements[i].classList.add("sel");
                if(activeSet)
                    pNavElements[i].classList.add("active");
                bgSpan = pNavElements[0].getElementsByTagName("span");
                bgSpan[0].style.top = pNavElements[i].offsetHeight*i + "px";
            }
            else{
                if(activeSet)
                    pNavElements[i].classList.remove("active");
                pNavElements[i].classList.remove("sel");
            }
        }
    }
}

function HomeHover(){
    HoverFunction("Home");
}function CVHover(){
    HoverFunction("CV");
}
function ProjetsHover(){
    HoverFunction("Projets");
}
function ContactHover(){
    HoverFunction("Contact");
}
function lostHover(){
    HoverFunction("active",true);
}
function ClickFuntion(IncludeName){
    var elements = document.getElementsByClassName("page");
    HoverFunction(IncludeName,false,true);
    for (let i = 0; i < elements.length; i++) {
        if(elements[i].id == IncludeName && IncludeName != "CV"){
            elements[i].classList.add("show");
        }else if(elements[i].id == "CV" && IncludeName != "CV"){
            var ontop = elements[i].getElementsByClassName("title");
            ontop[0].classList.remove("OnTop");
            elements[i].classList.remove("show");
        }else if(elements[i].id == "CV" && IncludeName == "CV"){
            elements[i].classList.add("show");
            var ontop = elements[i].getElementsByClassName("title");
            var body = elements[i].getElementsByClassName("body");
            setTimeout(function(ontop){
            ontop[0].classList.add("OnTop");
            },1,ontop);
            setTimeout(function(body){
            body[0].classList.add("show");
            },1,body);
        }else{
            elements[i].classList.remove("show");
        }
    }
}
function HomeClick(){
    ClickFuntion("Home");
}
function CVClick(){
    ClickFuntion("CV");
}
function ProjetsClick(){
    ClickFuntion("Projets");
}
function ContactClick(){
    ClickFuntion("Contact");
}
function WriteLangueCookie(langue){
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == 0)
                throw 'The cookie is not written !';
        }
      };
      xmlhttp.open("GET", "pages/cookiesWrite.php?langue="+langue, true);
      xmlhttp.send();
}
function languageClock(ln){
    if(ln != 'FR' && ln != 'EN')
        return;
    WriteLangueCookie(ln);
}
function frClick(){
    languageClock('FR');
    setTimeout(function(){
        window.location.reload();
    },500)
}
function enClick(){
    languageClock('EN');
    setTimeout(function(){
        window.location.reload();
    },500)
}
window.onload = function(){
    var elements = document.getElementsByClassName("p-navUL");
    var lnElements =  document.getElementsByClassName("langauges")[0].children;
    for (let i = 0; i < elements.length; i++) {
        if(elements[i].innerHTML.includes("Home")){
            elements[i].addEventListener("click", HomeClick, false);
            elements[i].addEventListener("mouseover", HomeHover, false);
        }
        else if(elements[i].innerHTML.includes("CV")){
            elements[i].addEventListener("click", CVClick, false);
            elements[i].addEventListener("mouseover", CVHover, false);
        }
        else if(elements[i].innerHTML.includes("Projets")){
            elements[i].addEventListener("click", ProjetsClick, false);
            elements[i].addEventListener("mouseover", ProjetsHover, false);
        }
        else if(elements[i].innerHTML.includes("Contact")){
            elements[i].addEventListener("click", ContactClick, false);
            elements[i].addEventListener("mouseover", ContactHover, false);
        }
      }
      elements[0].parentNode.addEventListener("mouseleave", lostHover, false);


      for(let i = 0;i<lnElements.length;i++){
        if(lnElements[i].innerHTML.includes('FR')){
            lnElements[i].addEventListener("click", frClick, false);
        }
        else if(lnElements[i].innerHTML.includes('EN')){
            lnElements[i].addEventListener("click", enClick, false);
        }

      }
      
};