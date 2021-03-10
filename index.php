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
    <body class="bgStyle">


        <?php
        include_once 'config.php';
        $err="";
        if($_SERVER['REQUEST_METHOD']==="POST" && $_POST['userid'] != "" && $_POST['userid'] != "")
        {
            
            $userid= mysqli_real_escape_string($con,$_POST['userid']);
            $pass= mysqli_real_escape_string($con,$_POST['userpass']);
            $sql="select count(id) as c from users where user_name='$userid' and password='$pass'";
            $r= mysqli_query($con, $sql);
            if(!$r)
            {
                printf("Error", mysqli_error($con));
            }
            else{
                $c= mysqli_fetch_array($r);
                if($c['c'] >= 1)
                {
                    
                   
                    header("location: home.php?u=$userid");
                }
                
                else{
                    $err="User id or Password not correct";
                }
            }
        }
 
        
        
        
        
        ?>
        
        <div class="container" >
            <div class="row">
                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="loginPanel">
                    <div class="big_icon"><i class="bi-person-circle"></i></div>
                    <form name="login" action="#" method="POST">
                        <div class="input-group inputbx">
                            <span class="input-group-addon"><i class="bi-person"></i></span>
                        <input type="text" class="form-control " name="userid" placeholder="Username" >
                        </div>
                        <div class="input-group  inputbx">
                            <span class="input-group-addon"><i class="bi-lock"></i></span>
                        <input type="password" class="form-control " name="userpass" placeholder="Password">
                        </div>
                        <input type="submit" value="Login" class="btn btn-info btn-sm">
                        <span style="color:red; font-size: 16px"><b><i>
                        <?php
                        if($err!="")
                        {
                            echo "<br>$err";
                        }
                        ?>
                                </i> </b></span>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
            </div>
        </div>
    </body>
</html>
