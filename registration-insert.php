<?php
include "init.php";
$user      =$_POST['username'];
$pass      =$_POST['password'];
$hashpass  =sha1($_POST['password']);
$email     =$_POST['email'];
upload("file","","data/uploads/");
sql("INSERT INTO users (username, password, email,date,image)
     VALUES ('$user', '$hashpass', '$email',NOW(),'$insert_src')","");
?>
