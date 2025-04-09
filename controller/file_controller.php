<!-- fileupload -->
<?php


if (isset($_POST['submit'])) {
    // file name from storephoto.php 
    $file = $_FILES['file'];
    // file name from storephoto.php  
    $fileName = $_FILES['file']['name'];
    // from filestmp
    $fileTmpName = $_FILES['file']['tmp_name'];
    // from filestmp
    $fileSize = $_FILES['file']['size'];
    // coming from Files
    $fileError = $_FILES['file']['error'];
    // coming from Files

    // coming from Files
    $fileType = $_FILES['file']['type'];
    // coming from Files

    //take a part of the file name to get the extension
    $fileExt = explode('.', $fileName);
    //take a part of the file name to get the extension

    // we want to check for other thing to a lower case strtolower
    // end id to get the second pics of data in the expload string
    $fileActualExt = strtolower(end($fileExt));
    // we want to check for other thing to a lower case strtolower
    // end id to get the second pics of data in the expload string

    //tell the kind of file we want to allow inside the website
    $allowed = array('jpg', 'png', 'jpeg', 'pdf');

    //check if the file is allowed to be uploaded inside the file


    //inside the inarray first we first of all tell what the varable we want to check
    if (in_array($fileActualExt, $allowed)) {
        //inside the inarray first we first of all tell what the varable we want to check


        //check if the file is not an error or empty
        if ($fileError == 0) {
            //check if the file is not an error

            //check if the file size is not too big
            if ($fileSize < 1000000) {
                //check if the file size is not too big

                //create a unic id to avoid the file name repeating the same
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                //a uniq time formart in macro secos

                //create a unic id to avoid the file name repeating the same
                //were we want to upload the file
                $fileDestination = 'uploads/' . $fileNameNew;
                //were we want to upload the file

                //create the function to uplaod the file
                move_uploaded_file($fileTmpName, $fileDestination);
              //create the function to uplaod the file

                // 
                //add the file  if  with a modal a+ if there is no erro

                // include "writeToFile.php";
                // store($fileDestination);
                
                //add the file  if  with a modal a+ if there is no erro

                echo 'upload successful upload';

            } else {
                echo " your file is too big";
            }
        } else {
            echo "there was an error uploading this file ";
        }
    } else {
        echo 'you cannot upload files of this type !';
    }
}











?>