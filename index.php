<?php 
session_start();

if(isset($_COOKIE['langue']))
    $_SESSION['langue'] = $_COOKIE['langue'];
else
    setcookie('langue','FR',time()+(60*60*24*7),'/');
$_SESSION['langue'] = isset($_SESSION['langue']) ? $_SESSION['langue'] : 'FR'; // if is set let it or make it equal to FR
if($_SESSION['langue'] != 'FR' && $_SESSION['langue'] != 'EN')
    $_SESSION['langue'] = 'FR';
$db = new PDO("mysql:host=localhost;dbname=cv_infos;charset=utf8","root","");
$exp_table = null;
$skills_table = null;
$study_table = null;
$exp_section_name = ($_SESSION['langue'] == 'FR') ? 'Expériences Professionnelles' : 'Professional Experience';
$study_section_name = ($_SESSION['langue'] == 'FR') ? 'Formations et Études' : 'Training and Studies';
$interest_section_name = ($_SESSION['langue'] == 'FR') ? 'Centre d\'intérêts' : 'Center of interest';
$table_prefix = ($_SESSION['langue'] == 'EN') ? '_en' : ''; 
$request1 = $db->query("SELECT *  FROM exp_table".$table_prefix);
$request2 = $db->query("SELECT *  FROM skills_table".$table_prefix);
$request3 = $db->query("SELECT *  FROM study_table".$table_prefix);
$exp_table_len = 0;
while($result = $request1->fetch()){
    if($result['id'] == -1)
        continue;
    $exp_table[$exp_table_len]['id'] =  $result['id'];
    $exp_table[$exp_table_len]['Language'] =  $result['Language'];
    $exp_table[$exp_table_len]['Job'] =  $result['Job'];
    $exp_table[$exp_table_len]['Title'] =  $result['Title'];
    $exp_table[$exp_table_len]['Place'] =  $result['Place'];
    $exp_table[$exp_table_len]['Place_description'] =  $result['Place_description'];
    $exp_table[$exp_table_len]['Date'] =  $result['Date'];
    $exp_table_len++;
}
$skills_table_len = 0;
while($result = $request2->fetch()){
    if($result['id'] == -1)
        continue;
    $skills_table[$skills_table_len]['id'] =  $result['id'];
    $skills_table[$skills_table_len]['under_id'] =  $result['under_id'];
    $skills_table[$skills_table_len]['Title'] =  $result['Title'];
    $skills_table[$skills_table_len]['Content'] =  $result['Content'];
    $skills_table[$skills_table_len]['Language'] =  $result['Language'];
    $skills_table_len++;
}
$study_table_len = 0;
while($result = $request3->fetch()){
    if($result['id'] == -1)
        continue;
    $study_table[$study_table_len]['id'] =  $result['id'];
    $study_table[$study_table_len]['Language'] =  $result['Language'];
    $study_table[$study_table_len]['Level'] =  $result['Level'];
    $study_table[$study_table_len]['Title'] =  $result['Title'];
    $study_table[$study_table_len]['Mention'] =  $result['Mention'];
    $study_table[$study_table_len]['Place'] =  $result['Place'];
    $study_table[$study_table_len]['Date'] =  $result['Date'];
    $study_table_len++;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="styles/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="styles/titleStyle.css" />
        <link rel="stylesheet" type="text/css" href="styles/bodyStyle.css" />
    </head>
<body>
    <div class="navwrapper">
        <div class="bg"></div>
        <div class="nav">
            <div class="langauges">
                <p <?php echo  $_SESSION['langue'] == 'FR' ? 'class="sel"':'';?>>FR</p>
                <p <?php echo  $_SESSION['langue'] == 'EN' ? 'class="sel"':'';?>>EN</p>
            </div>
            <div class="navUl">
                <p class="p-navUL sel active" id="Home"><span></span>Home</p>
                <p class="p-navUL" id="CV">CV</p>
                <p class="p-navUL" id="Projets">Projets</p>
                <p class="p-navUL" id="Contact">Contact</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="page show" id="Home">
            <div class="title">
                <img src="imgs/pic.jpg">
                <div class="right">
                    <div></div>
                    <div>
                        <span class="name"> <b> Houdeifa </b> AFLIHAOU</span>
                        <span class="title">Ingenieur systemes embarqués</span>
                    </div>
                    <div></div>
                    

                </div>
        
            </div>
        </div>
        <div class="page" id="CV">
            <div class="title">
                <img src="imgs/pic.jpg">
                <div class="right">
                    <div></div>
                    <div>
                        <span class="name"> <b> Houdeifa </b> AFLIHAOU</span>
                        <span class="title">Ingenieur systemes embarqués</span>
                    </div>
                    <div></div>
                </div>
        
            </div>
            <?php include("pages/cv.php");?>
        </div>
        <div class="page" id="Projets">
        </div>
        <div class="page" id="Contact">
        </div>
    </div>
    <script src="js/style_js.js"></script>
</body>

</html>