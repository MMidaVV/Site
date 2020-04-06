<?php
    $name=$_REQUEST['name'];
    $name=$_REQUEST['last_name'];
    $name=$_REQUEST['second_name'];
    $name=$_REQUEST['login'];
    $name=$_REQUEST['paswrd'];
    $name=$_REQUEST['telephone'];
    $name=$_REQUEST['adress'];
    
    mysql_select_db('midav') or die('не удалось выбрать бд');
    $query = "INSERT into `names`('id','name','last_name','second_name','login','pasword','telephone','adress') VALUES (NULL,'$name','$last_name','$second_name','$login','$pasword','$telephone','$adress')
    $result  = mysql_query($query) or die(mysql_error());

?>
