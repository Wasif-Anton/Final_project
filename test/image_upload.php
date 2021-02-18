<?php

// Uploading an Image
if (isset($_POST['ADD'])) {
  $file = $_FILES['file'];

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  // Chaneging from upper to lower letters after the dot (.)
  $fileActualExt = strtolower(end($fileExt));
  // What type of files allowed into the website
  $allowed = array('jpg', 'jpeg', 'png', 'pdf');

  // File Type - If the file is right type end with 'jpg', 'jpeg', 'png', 'pdf'
  if (in_array($fileActualExt, $allowed)) {
    // File Error - Make sure there is no errors
    if ($fileError === 0) {
      // File Size - up to 1 Gigabyte
      if ($fileSize < 1000000) {
        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = 'uploads/' . $fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
      }
      // File Size - if the file > 1 Gigabyte
      else {
        echo "Your file is too big!";
      }
    }
    // File Error - Error message
    else {
      echo "There was an error uploading your file!";
    }
  }
  // File Type - If the file is wrong type
  else {
    echo "You can not upload giles of this type!";
  }
}
