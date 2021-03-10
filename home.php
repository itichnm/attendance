<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ITI Attendance System</title>
        <link rel="stylesheet" href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/bootstrap-icons-1.4.0/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css"/>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>   
        <script type="text/javascript" src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
        
    </head>
    <body>
        <div class="container">
             <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">ITI Attendance System</a>
              </div>
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">User
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="newuser.php">Create User</a></li>
                  </ul>
                </li>
                <li><a href="#">Attendance</a></li>
                
              </ul>
            </div>
          </nav> 
            
            
            
        </div>
        
        
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
