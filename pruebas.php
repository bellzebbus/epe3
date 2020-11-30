<?php

require 'includes/dbh.inc.php';
$status = $statusMsg = '';

if(isset($_POST["r-anf-submit"])){
   $status = 'error';
   if(!empty($_FILES["r-anf-logo"]["name"])) {
       // Get file info
       $fileName = basename($_FILES["r-anf-logo"]["name"]);
       $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

       // Allow certain file formats
       $allowTypes = array('jpg','png','jpeg','gif');
       if(in_array($fileType, $allowTypes)){
           $image = $_FILES['r-anf-logo']['tmp_name'];
           $imgContent = addslashes(file_get_contents($image));

           // Insert image content into database
           $insert = $db->query("INSERT into anfitrion (img) VALUES ('$imgContent')");

           if($insert){
               $status = 'success';
               $statusMsg = "File uploaded successfully.";
           }else{
               $statusMsg = "File upload failed, please try again.";
           }
       }else{
           $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
       }
   }else{
       $statusMsg = 'Please select an image file to upload.';
       echo $_FILES["r-anf-logo"]["name"];
   }
}

// Display status message
echo $statusMsg;
