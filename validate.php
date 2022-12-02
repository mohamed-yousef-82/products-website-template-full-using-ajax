<?php


$errorMSG = "";


/* USERNAME */
if (empty($_POST["username"])) {
    $errorMSG = "<li>Username is required</<li>";
} else {
    $username = $_POST["username"];
}
/* PASSWORD */
if (empty($_POST["password"])) {
    $errorMSG = "<li>Username is required</<li>";
} else {
    $password = $_POST["password"];
}


/* EMAIL */
if (empty($_POST["email"])) {
    $errorMSG .= "<li>Email is required</li>";
} else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "<li>Invalid email format</li>";
}else {
    $email = $_POST["email"];
}

if(empty($errorMSG)){
	// $msg = "Name: ".$username.", Email: ".$email.", Password: ".$password;
	echo json_encode(['code'=>200, 'msg'=>$msg]);
  // upload("file","","data/uploads/");
  // sql("INSERT INTO users (username, password, email,date,image)
  //      VALUES ('$username', '$password', '$email',NOW(),'$insert_src')","");
  //      echo "Inserted Succefuly";
}

echo json_encode(['code'=>404, 'msg'=>$errorMSG]);

?>
