<?php 
 ini_set('display_errors', 1);
 error_reporting(E_ALL);
 echo '<pre>';print_r($_FILES);
        if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"../files/".$_FILES["fileUpload"]["name"]))
        {
            echo "Copy/Upload Complete";
        }