<?php
include('connect.php');
if(isset($_POST["roles"]) && isset($_POST["email"]) && isset($_POST["motDePasse"])){
$roles = $_POST["roles"];
$email = $_POST["email"];
$motDePasse = $_POST["motDePasse"];

// @$roles = 0;

if($email!="" && $motDePasse!="" && $roles == "1"){
 
  $sql="SELECT * FROM users WHERE email='$email' AND motDePasse='$motDePasse' AND roles='$roles'";
  $rss = mysqli_query($conn,$sql);

  if(mysqli_num_rows($rss) > 0){
    echo json_encode(['success_msg' => 'User a été enregistrer']);
   
  }

}
elseif($email!="" && $motDePasse!="" && $roles == "0"){
  $email = $_POST["email"];
  $motDePasse = $_POST["motDePasse"];
  $roles = $_POST["roles"];
  $sql1="SELECT * FROM users WHERE email='$email' AND motDePasse='$motDePasse' AND roles='$roles'";
  $rss1 = mysqli_query($conn,$sql1);

  if(mysqli_num_rows($rss1) > 0){
    echo json_encode(['succes_msg' => 'User a été enregistrer']);
  }
}
else {
  echo json_encode(['suces_msg' => 'User n a pas été enregistrer']);
}
 mysqli_close($conn);
}
?>






