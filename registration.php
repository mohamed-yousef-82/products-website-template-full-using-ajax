<?php
$pageTitle ="registration";
include "init.php";
//Manage Page
  ?>
  <div class="container">
  <div class="page-style-one">
  <h2 class="page-title">Registration</h2>
  <form class="form registration" method="post" enctype="multipart/form-data">
  <!--Start Name -->
      <input type="text" name="username" placeholder=<?php echo lang('USERNAME') ?> required="required">
      <label><?php echo lang('IMAGE') ?></label>
      <input type="file" name="file"  required="required">
  <!--Start Password -->
      <input type="password"  class="password form-control" name="password" autocomplete="new-password" placeholder="Password">
  <!--Start Email -->
      <input type="email" name="email" placeholder=<?php echo lang('EMAIL') ?> required="required">
  <!--Start Sent -->
      <button type="button" id="registration_btn" name="submit" class="start-btn blue"><?php echo lang('INSERT') ?></button>
</form>
  </div>
</div>
</div>
<?php
// //php validation
if(isset($_POST["submit"])){
$formErrors=array();
if(strlen($user) < 4){
  $formErrors[] = "Your Username Is Very Less";
}

if(strlen($user) > 20){
  $formErrors[] = "Your Username Is Very Long";
}

if(empty($user)){
  $formErrors[] = "Username Required";
}

if(empty($pass)){
  $formErrors[] = "Password Required";
}

if(empty($email)){
  $formErrors[] = "Email Required";
}

if(empty($full)){
  $formErrors[] = "Full Name Required";
}

foreach ($formErrors as $error){
echo "<div class='alert alert-danger'>$error</div>";
}
//Update In Database
if (empty($formErrors)){
  // Check If User Exit In Database
  // $check = checkItems("username","users",$user);
  // if($check > 0){
  //   echo 'Sorry This User Id Exist';
  // }else{
?>
<?php
// }
}
}
 ?>
