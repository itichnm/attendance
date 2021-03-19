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
            
            
           <div class="row newuserform">
               <form name="attendance" action="#" method="post">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   
                   <div class="input-group">
                       <span class="input-group-addon">Trade</span>
                       <select name="trade" class="form-control">
                       <?php
                         include_once 'config.php';
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
                   <input type="submit" class="btn btn-info" value="Submit" style="margin-top: 10px">
               </div>
               
                   
               </form>
           </div>
           
           <div class='row'>
               <table>
               <?php
               if($_SERVER['REQUEST_METHOD']==="POST" && $_POST['trade'] != "")
        {
                   $tname= mysqli_query($con, "select traineeName from trainee_data where trade='".$_POST['trade']."'");
                   if($tname)
                   {
                       while($tt= mysqli_fetch_array($tname))
                       {
                       ?>
                   <tr>
                       <td><?php echo $tt['traineeName']; ?></td><td><input type="checkbox"></td>
                   </tr>
                       
                       <?php
                       }
                   }
               }
               ?>
               </table>
           </div>
        </div>
        
        
    </body>
</html>
