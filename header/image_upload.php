<?php
$UploadedImg="";
if ($_FILES["file"]["error"] > 0) {
    //echo "Error: " . $_FILES["file"]["error"] . "<br>";
} else {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    //echo "Stored in: " . $_FILES["file"]["tmp_name"];
}

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 20000000) && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        //echo "Error: " . $_FILES["file"]["error"] . "<br>";
    } else {
        //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        //echo "Type: " . $_FILES["file"]["type"] . "<br>";
        //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        //echo "Stored in: " . $_FILES["file"]["tmp_name"];
    }
} else {
    //echo "Invalid file Restriction";
}

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 20000000) && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        //echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        //echo "Type: " . $_FILES["file"]["type"] . "<br>";
        //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

        if (file_exists("UploadedImages/" . $_FILES["file"]["name"])) {
            //echo $_FILES["file"]["name"] . " already exists. ";
			$randKey = md5(microtime().rand());
          move_uploaded_file($_FILES["file"]["tmp_name"], "UploadedImages/" . $randKey.$_FILES["file"]["name"]);
            //echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
            
            $UploadedImg = $randKey.$_FILES['file']['name'];
		} else {
            move_uploaded_file($_FILES["file"]["tmp_name"], "UploadedImages/" . $_FILES["file"]["name"]);
            //echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
            
            $UploadedImg = $_FILES['file']['name'];
            
        }
    }
} else {
    //echo "Invalid file Saving";
}
?>