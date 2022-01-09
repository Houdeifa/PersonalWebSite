<?php
if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['message'])){
    if($_GET['name'] == '' || $_GET['email'] == '' || $_GET['message'] == '')
        echo "0";
    else{
        $name = addslashes($_GET['name']);
        $email = addslashes($_GET['email']);
        $message = addslashes($_GET['message']);

        $db = new PDO("mysql:host=localhost;dbname=cv_infos;charset=utf8","root","");
        
        $request = $db->query("INSERT INTO messages_recus (id, Name, Email, Message) VALUES (NULL, '".$name."', '".$email."', '".$message."')");
        if($request)
            echo "1";
        else
            echo "0";
    }
}else
    echo "0";

?>