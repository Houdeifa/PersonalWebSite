<?php
if(isset($_GET['langue']) && ($_GET['langue'] == 'FR' || $_GET['langue'] == 'EN')){
    setcookie('langue',$_GET['langue'],time()+(60*60*24*7),'/');
    echo "1";
}else
    echo "0";
?>