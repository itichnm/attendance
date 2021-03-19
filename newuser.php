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
    
    <?php
        include_once 'config.php';
        $err="";
        if($_SERVER['REQUEST_METHOD']==="POST" && $_POST['pass'] != "" && $_POST['username'] != "")
        {
            
            $username= mysqli_real_escape_string($con,$_POST['username']);
            $pass= mysqli_real_escape_string($con,$_POST['pass']);
            $conpass=mysqli_real_escape_string($con,$_POST['conpass']);
            $trade=mysqli_real_escape_string($con,$_POST['trade']);
            $sql="INSERT INTO `users` ( `user_name`, `password`, `trade`) VALUES ('$username', '$pass', '$trade') ";
           
            if($pass==$conpass)
            {
                $r= mysqli_query($con, $sql);
                if(!$r)
                {
                    printf("Error", mysqli_error($con));
                }
                else{
                    $err="Saved Successfully!";
                }
            }
            else{
                $err="Password Mismatch";
            }
        }
 
        ?>
    
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
                <li><a href="attendance.php">Attendance</a></li>
                
              </ul>
            </div>
          </nav> 
            
            
           <div class="row newuserform">
               <form name="newUser" action="#" method="post">
               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                   <div class="input-group" style="margin-bottom: 10px">
                       <span class="input-group-addon">Username</span>
                       <input class="form-control" name ="username" type="text">
                   </div>
                   <div class="input-group">
                       <span class="input-group-addon">Trade</span>
                       <select name="trade" class="form-control">
                           <?php
                           $tradeName= mysqli_query($con, "select DISTINCT(trade) as Trd from trainee_data");
                           while ($t = mysqli_fetch_array($tradeName))
                           {
                           ?>
                           <option value="<?php echo $t['Trd']?>"><?php echo $t['Trd']?></option>
                           <?php
                           }
                           ?>
                       </select>
                   </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                   <div class="input-group"  style="margin-bottom: 10px">
                       <span class="input-group-addon">Password</span>
                       <input class="form-control" name ="pass" type="password">
                   </div>
                   <div class="input-group">
                       <span class="input-group-addon">Confirm Password</span>
                       <input class="form-control" name ="conpass" type="password">
                   </div>
               </div>
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <input type="submit" class="btn btn-info" value="Submit" style="margin-top: 10px"> 
                       
                       <?php echo $err; ?>
                   </div>
               </form>
           </div>
        </div>
        
        
    </body>
        
</html>
