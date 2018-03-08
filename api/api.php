<?php

$request_parts = explode('/', $_GET['url']); // array('users', 'show', 'abc')
$file_type     = $_GET['type'];

// $output = get_data_from_db(); //Do your processing here
                              //You can outsource to other files via an include/require
print_r($request_parts);
//Output based on request
switch($file_type) {
    case 'json':
        // echo json_encode($output);
        break;
    case 'xml':
        // echo xml_encode($output); //This isn't a real function, but you can make one
        break;
    default:
        // echo $output;
}