<?php

function validateInputText($textValue){
	if(!empty($textValue)){
		$trim_text = trim($textValue);
		$sanitizeStr = filter_var($trim_text, FILTER_SANITIZE_STRING);
		return $sanitizeStr;
	}
	else {
		return "";
	}
}

function validateInputEmail($emailValue){
	if(!empty($emailValue)){
		$trim_text = trim($emailValue);
		$sanitizeStr = filter_var($trim_text, FILTER_SANITIZE_EMAIL);
		return $sanitizeStr;
	}
	else {
		return "";
	}
}

function upload_profile($path, $file){
    $targetDir = $path;
    $default = "beard.png";

    // get the filename
    $filename = basename($file['name']);
    $targetFilePath = $targetDir . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    If(!empty($filename)){
        // allow certain file format
        $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if(in_array($fileType, $allowType)){
            // upload file to the server
            if(move_uploaded_file($file['tmp_name'], $targetFilePath)){
                return $targetFilePath;
            }
        }
    }

    // return default image
    return $path . $default;
}
