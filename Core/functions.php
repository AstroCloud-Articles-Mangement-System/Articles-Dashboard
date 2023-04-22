<?php


function base_path($path)
{
    return  $path;
}

function write_to_log_file($exceptionMsg, $fileName, $exceptionLine) {
    // Get additional details
    $datetime = date("Y-m-d H:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER['HTTP_USER_AGENT'];
    
    // Create  message
    $Message = "$datetime | $ip | $browser | $exceptionMsg | $fileName | $exceptionLine\n";

    // Log msg to file
    error_log($Message, 3,__LOG_FILE_PATH__); //3-->flag-->Write operation 
}
