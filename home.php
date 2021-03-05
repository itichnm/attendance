<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        Welcome User of 
        <?php
        include_once 'config.php';
        $err="";
        if($_SERVER['REQUEST_METHOD']==="GET" && $_GET['u'] != "")
        {
            
            $userid= mysqli_real_escape_string($con,$_GET['u']);
            $sql="select trade from users where user_name='$userid'";
            $r= mysqli_query($con, $sql);
            if(!$r)
            {
                printf("Error", mysqli_error($con));
            }
            else{
                $c= mysqli_fetch_array($r);
                $trade=$c['trade'];
                echo "$trade";
            }
        }
        ?>
    </body>
</html>
