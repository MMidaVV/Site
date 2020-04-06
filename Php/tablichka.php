<?php
    $link = mysql_connect('127.0.0.1:3306 ', 'root','')
        or die('Не удалось соединиться' . mysql_error());
    echo "Подключение установлено!!!";
    
    mysql_select_db('midav') or die('не удалось выбрать бд');
    $query = 'SELECT * FROM `users`';
    $result  = mysql_query($query) or die(mysql_error());
?>
        <table border=2>
            <tr>
                <td>id</td>
                <td>name</td>
                <td>Last name</td>
                <td>Second name</td>
                <td>login</td>
                <td>pasword</td>
                <td>telephone</td>
                <td>adress</td>
                
            </tr>    
<?php
    while($elem = mysql_fetch_array($result, MYSQL_ASSOC)){
    ?>
         <tr>
                <td><?php echo $elem['id'];?></td>
                <td><?php echo $elem['name'];?></td>
                <td><?php echo $elem['last_name'];?></td>
                <td><?php echo $elem['second_name'];?></td>
                <td><?php echo $elem['login'];?></td>
                <td><?php echo $elem['pasword'];?></td>
                <td><?php echo $elem['telephone'];?></td>
                <td><?php echo $elem['adress'];?></td>
            </tr    
        <?php
    }
?>