<?php
require_once('connectvars.php');
require_once('appvars.php');
require_once('adminpanel.php');

if (isset($_POST['submit'])) {


if (!empty($_FILES)) {
  $textheader = $_POST['textheader'];
  $textarea = $_POST['textarea'];
  $image=$_FILES['fileToUpload']['name'];
  $target_dir = "uploadedfiles/";
  $target_file = $target_dir .time(). basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
// Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
// Check file size
  if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
// Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if ((move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))&& isset($_POST['submit'])) {
   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      mysqli_set_charset($dbc, "utf8");
            // Write the data to the database
   $selectoption=$_POST['select'];
   switch ($selectoption) {
     case '1':
     $query = "INSERT INTO done_add (header, text, image) VALUES ('$textheader','$textarea','$image')";
     mysqli_query($dbc, $query);
     echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
     break;
     case '2':
     $query = "INSERT INTO development_add (header, text, image) VALUES ('$textheader','$textarea','$image')";
     mysqli_query($dbc, $query);
     echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
     break;
     case '3':
     $query = "INSERT INTO inprocess_add (header, text, image) VALUES ('$textheader','$textarea','$image')";
     mysqli_query($dbc, $query);
     echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
     break;
   }

 }
 else {
  echo "Sorry, there was an error uploading your file.";
}
}
}

}
?>
