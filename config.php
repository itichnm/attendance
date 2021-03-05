<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$server="localhost";
$database = "attendance";
$username = "root";
$password="";
$con= mysqli_connect($server, $username, $password, $database);
$db= mysqli_select_db($con, $database);
?>