<?php

include('connect.php');

if(isset($_POST["submit"])){
    $noms = $_POST["nom"];
    $email = $_POST["email"];
    $cont = $_POST["contact"];
    $par = addslashes($_POST["parcours"]);
    $part = addslashes($_POST["dom"]);
    $mess = addslashes($_POST["messages"]);
    $desp = addslashes($_POST["descriptions"]);

    $image3 = $_FILES['profil']['name'];
    $tempname3 = $_FILES['profil']['tmp_name'];
    $temp3 = explode(".", $_FILES["profil"]["name"]);
    $newfilename3 = round(microtime(true)) . '.' .end($temp3);
    $finaldestination3 = "imagess4/".$newfilename3;  
    $folder3 = "imagess4/".$newfilename3;
    if(move_uploaded_file($tempname3,$folder3)){
        echo 'images est uplade';
    }


    $image = $_FILES['imagepub']['name'];
    $tempname = $_FILES['imagepub']['tmp_name'];
    $temp = explode(".", $_FILES["imagepub"]["name"]);
    $newfilename = round(microtime(true)) . '.' .end($temp);
    $finaldestination = "imagess1/".$newfilename;  
    $folder = "imagess1/".$newfilename;
    if(move_uploaded_file($tempname,$folder)){
        echo 'images est uplade';
    }



    $image1 = $_FILES['imagepub1']['name'];
    $tempname1 = $_FILES['imagepub1']['tmp_name']; 
    $temp1 = explode(".", $_FILES["imagepub1"]["name"]);
    $newfilename1 = round(microtime(true)) . '.' .end($temp1);
    $finaldestination1 = "imagess2/".$newfilename1; 
    $folder1 = "imagess2/".$newfilename1;
    if(move_uploaded_file($tempname1,$folder1)){
        echo 'images est uplade';
    }
            
            $sql = "INSERT INTO `projet`(nom, email, contact, parcours, dom, messages, descriptions, profil, imagepub, imagepub1, dates) 
            VALUES ('$noms', '$email', '$cont', '$par', '$part', '$mess', '$desp', '$finaldestination3', '$finaldestination', '$finaldestination1', NOW())";
             header("location:pubprojet_profile.php");
            //  echo $sql;
        if(mysqli_query($conn, $sql)){
          echo "succes";
        }else{
          echo "error: ". $sql . "<br>" .mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    
?>