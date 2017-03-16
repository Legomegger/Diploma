<?php
require_once('connectvars.php');
require_once('appvars.php');
require_once('adminpanel.php');
if (isset($_POST['submita'])) {

if (!empty($_FILES)) {
  $imagegp=$_FILES['fileToUploadgp']['name'];
  $imagepro=$_FILES['fileToUploadpro']['name'];
  $text=$_POST['textareaa'];
  $id_k=$_POST['selectlink'];
  $target_dir = "uploadedfiles/donefiles/";
  $target_filegp = $target_dir . basename($_FILES["fileToUploadgp"]["name"]);
  $target_filepro = $target_dir . basename($_FILES["fileToUploadpro"]["name"]);
  $uploadOk = 1;
  $imageFileTypegp = pathinfo($target_filegp,PATHINFO_EXTENSION);
    $imageFileTypepro = pathinfo($target_filepro,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
  if(isset($_POST["submita"])) {
    $check = getimagesize($_FILES["fileToUploadgp"]["tmp_name"]);
    $check1= getimagesize($_FILES["fileToUploadpro"]["tmp_name"]);
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
  if ($_FILES["fileToUploadgp"]["size"] > 5000000 || $_FILES["fileToUploadpro"]["size"] > 5000000) {
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
  if (isset($_POST['submita'])){
    (move_uploaded_file($_FILES["fileToUploadgp"]["tmp_name"], $target_filegp));
    (move_uploaded_file($_FILES["fileToUploadpro"]["tmp_name"], $target_filepro));
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            // Write the data to the database
    $query="INSERT INTO done_show (imggp,imgpro,id_k,text) VALUES ('$imagegp','$imagepro','$id_k','$text')";
    mysqli_query($dbc,$query);
    echo "The file ". basename($_FILES["fileToUploadgp"]["name"]). basename($_FILES["fileToUploadpro"]["name"]). " has been uploaded.";

  }
}
}
}

?>
