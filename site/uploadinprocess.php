<?php
require_once('connectvars.php');
require_once('appvars.php');
require_once('adminpanel.php');
if (isset($_POST['submitc'])) {

if (!empty($_FILES)) {
  $imagegp=$_FILES['fileToUploadgpinpro']['name'];
  $imagepro=$_FILES['fileToUploadproinpro']['name'];
  $text=$_POST['textareac'];
  $textheader=$_POST['headerc'];
  $id_k=$_POST['selectlink'];
  $target_dir = "uploadedfiles/inprocessfiles/";
  $target_filegp = $target_dir .time(). basename($_FILES["fileToUploadgpinpro"]["name"]);
  $target_filepro = $target_dir .time(). basename($_FILES["fileToUploadproinpro"]["name"]);
  $uploadOk = 1;
  $imageFileTypegp = pathinfo($target_filegp,PATHINFO_EXTENSION);
    $imageFileTypepro = pathinfo($target_filepro,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
  if(isset($_POST["submitc"])) {
    $check = getimagesize($_FILES["fileToUploadgpinpro"]["tmp_name"]);
    $check1= getimagesize($_FILES["fileToUploadproinpro"]["tmp_name"]);
    if(($check && $check1) !== false) {
      echo "File is an image - " . $check["mime"] . $check1["mime"].".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
// Check if file already exists
  if (file_exists($target_filegp || $target_filepro)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
// Check file size
  if ($_FILES["fileToUploadgpinpro"]["size"] > 5000000 || $_FILES["fileToUploadproinpro"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
// Allow certain file formats
  if(($imageFileTypegp != "jpg" && $imageFileTypegp != "png" && $imageFileTypegp != "jpeg"
    && $imageFileTypegp != "gif" )&&($imageFileTypepro != "jpg" && $imageFileTypepro != "png" && $imageFileTypepro != "jpeg"
    && $imageFileTypepro != "gif" )) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else{
  if (isset($_POST['submitc'])){
    (move_uploaded_file($_FILES["fileToUploadgpinpro"]["tmp_name"], $target_filegp));
    (move_uploaded_file($_FILES["fileToUploadproinpro"]["tmp_name"], $target_filepro));
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      mysqli_set_charset($dbc, "utf8");
            // Write the data to the database
    $query="INSERT INTO inprocess_show (header,imggp,imgpro,id_k,text) VALUES ('$textheader','$imagegp','$imagepro','$id_k','$text')";
    mysqli_query($dbc,$query);
    echo "The file ". basename($_FILES["fileToUploadgpinpro"]["name"]). basename($_FILES["fileToUploadproinpro"]["name"]). " has been uploaded.";

  }
}
}
 
}
?>
