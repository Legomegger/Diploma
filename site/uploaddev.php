<?php
require_once('connectvars.php');
require_once('appvars.php');
require_once('adminpanel.php');
if (isset($_POST['submitb'])) {

if (!empty($_FILES)) {
  $imagegp=$_FILES['fileToUploadgpdev']['name'];
  $imagepro=$_FILES['fileToUploadprodev']['name'];
  $text=$_POST['textareab'];
  $textheader=$_POST['headerb'];
  $id_k=$_POST['selectlink'];
  $target_dir = "uploadedfiles/developmentfiles/";
  $target_filegp = $target_dir .time(). basename($_FILES["fileToUploadgpdev"]["name"]);
  $target_filepro = $target_dir .time(). basename($_FILES["fileToUploadprodev"]["name"]);
  $uploadOk = 1;
  $imageFileTypegp = pathinfo($target_filegp,PATHINFO_EXTENSION);
    $imageFileTypepro = pathinfo($target_filepro,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
  if(isset($_POST["submitb"])) {
    $check = getimagesize($_FILES["fileToUploadgpdev"]["tmp_name"]);
    $check1= getimagesize($_FILES["fileToUploadprodev"]["tmp_name"]);
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
  if ($_FILES["fileToUploadgpdev"]["size"] > 5000000 || $_FILES["fileToUploadprodev"]["size"] > 5000000) {
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
  if (isset($_POST['submitb'])){
    (move_uploaded_file($_FILES["fileToUploadgpdev"]["tmp_name"], $target_filegp));
    (move_uploaded_file($_FILES["fileToUploadprodev"]["tmp_name"], $target_filepro));
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            // Write the data to the database
    $query="INSERT INTO development_show (header,imggp,imgpro,id_k,text) VALUES ('$textheader','$imagegp','$imagepro','$id_k','$text')";
    mysqli_query($dbc,$query);
    echo "The file ". basename($_FILES["fileToUploadgpdev"]["name"]). basename($_FILES["fileToUploadprodev"]["name"]). " has been uploaded.";

  }
}
}
}
?>
