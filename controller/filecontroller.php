<?php
// include(__DIR__."/../views/images");
class filecontroller{
    public function checkfile()
    {
        $imageName = $_FILES['user-image']['name'];
  
        $imageTmp = $_FILES['user-image']['tmp_name'];
     
        $imageSize = $_FILES['user-image']['size'];
    
        $imageType = explode("/",$_FILES['user-image']['type']);

        $recommendedTypes = ['jpg', 'png', 'jpeg', 'pdf'];
    
        //check if the file is allowed to be uploaded inside the file
        // var_dump($_FILES);
    
        //inside the inarray first we first of all tell what the varable we want to check
        if ($imageName != null) {
            if ($imageSize < 1000000) {
                if(in_array($imageType[1],$recommendedTypes)){
                    
                    $result = ['file_tmp' => $imageTmp,'file_name' => $imageName];
                    return $result;
                } else{
                    throw new Exception ("File should be either JPEG or PNG");
                }

            } else {
                throw new Exception ('Files size is too large');
            }
    
        } else {
            throw new Exception ('Select a file to be uploaded');
        }
    }


}








?>