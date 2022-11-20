<?php

$logFile = fopen("log.txt", "a");;

if(isset($_POST["submit"])) {
    uploadFile();
}

fclose($logFile);

function uploadFile() {
    global $logFile;
    
    $file = $_FILES["fileUpload"];
    $filename = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];
    
    $targetDir = "uploads/";
    
    if(!is_dir($targetDir)) {
        mkdir($targetDir, 0777);
    }
    
    // basename returns only the filename without path and extension
    $targetFile = $targetDir . basename($filename);
    addLogLine($logFile, $targetFile, "INFO");
    
    $targetRndName = $targetDir . generateRndName();
    addLogLine($logFile, $targetRndName, "INFO");
    
    $targetFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    // Check if file is not bigger than 500kb (in bytes)
    if($fileSize > 500000) {
        addLogLine($logFile, "File too big", "ERROR");
        echo "<b>File too big</b>";
        return;
    }
    
    $generatedName = $targetDir . generateRndName() . "." . $targetFileType;
    
    // Upload file
    if(move_uploaded_file($fileTmpName, $generatedName)) {
        addLogLine($logFile, "File uploaded", "SUCCESS");
        $link = "Copy this link for your file or click to download: ";
        $link .= "<a href='$generatedName'>$filename</a><br>";
        
        echo $link;
        echo "<a href='/FileUploader'>Back to Upload</a>";
    }
    else {
        addLogLine($logFile, "Error uploading File", "ERROR");
    }
}

/**
 * Generate a unique id with a prefix.
 */
function generateRndName() {
    $prefix = "file_";
    return uniqid($prefix);
}

/**
 * Write a log line containing date and time into a file.
 * @param File $file
 * @param string $text
 * @param string $type
 */
function addLogLine($file, $text, $type) {
    if($file) {
        fwrite($file, date("d-m-Y") . "|" . date("h:i:s") . "\t" . $type . "\t" . $text . "\n");   
    }
    else return;
}
?>
