<?php
// Check if image file is a actual image or fake image

    //date_default_timezone_set('Africa/Nairobi');
    //$time = date('Ymd-hms');

    $target_dir = "images/user_images/";
    $photo = basename($_FILES["fileToUpload"]["name"]);

    $target_file = $target_dir . $photo;
    $uploadOk = 0;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if($check) {

        $uploadOk = 1;
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
            && $imageFileType != "gif") 
        {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        else
        {
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {// file shouldn't exceed 500kb
                echo "file is too large.";
                $uploadOk = 0;
            }
            else
            {
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "file already exists.";
                    $uploadOk = 0;
                }
                else
                {
                    // Check if $uploadOk is set to 0 by an error
                    if (!$uploadOk) {
                        echo "file not uploaded";
                    // if everything is ok, try to upload file
                    } 
                    else 
                    {

                        $image = explode(".", $photo);

                        $img_start = $image[0];
                        $img_end = $image[1];

                        //change photo name from the basename to basename + timestamp.
                        //$img_start = $img_start  . $time;
                        //$new_file_name = $img_start . "." . $img_end;

                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $photo)) {

                            $uname = $_SESSION['username'];

                            $sql = "UPDATE users SET profile_pic = '$img_start'
                            WHERE username = '$uname'";

                            if ($result= $db_instance->query($sql)) 
                                echo $img_start . " Uploaded successfully";

                            $_SESSION['pic'] = $img_start;
                            return;
                        } 
                        else 
                        {
                            echo "Sorry, an error occurred";
                        }
                    }
                }
            }
        }

    } else {
        echo "File is not an image";
        $uploadOk = 0;
    }
    
?>