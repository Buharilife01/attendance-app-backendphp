<!-- fileupload -->
<?php
 


    if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);

    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'png', 'jpeg', 'pdf');

    if (in_array($fileActualExt, $allowed)) {

        if ($fileError == 0) {
            if ($fileSize < 1000000) {

                $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                $fileDestination = 'uploads/' . $fileNameNew;

                move_uploaded_file($fileTmpName, $fileDestination);
                // add the file with a modal a+
                include "storephoto.php";
                store($fileDestination);
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