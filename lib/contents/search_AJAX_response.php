<?php

// key to authenticate
if (!defined('INDEX_AUTH')) {
    define('INDEX_AUTH', '1');
}

sleep(1);
require '../../sysconfig.inc.php';

header('Content-type: text/javascript');

$output = '';

$query = '';

if(isset($_POST["query"]))
{   
    $tipe_upload = $_POST["type"];
    $major_number = 0;
    $thesis_number = 0;

    switch ($tipe_upload) {
    case "taTIK":
    case "jurTIK":
    case "lapTIK":
    case "propTIK":
    case "tesTIK":
        $major_number = 4;
        break;
    case "taAN":
    case "jurAN":
    case "lapAN":
    case "propAN":
    case "tesAN":
        $major_number = 7;
        break;
    case "taTM":
    case "jurTM":
    case "lapTM":
    case "propTM":
    case "taTM":
        $major_number = 2;
        break;
    case "taTS":
    case "jurTS":
    case "lapTS":
    case "propTS":
    case "taTS":
        $major_number = 1;
        break;
    case "taTE":
    case "jurTE":
    case "lapTE":
    case "propTE":
    case "taTE":
        $major_number = 3;
        break;
    case "taA":
    case "jurA":
    case "lapA":
    case "propA":
    case "taA":
        $major_number = 6;
        break;
    case "taTGPTN":
    case "jurTGPTN":
    case "lapTGPTN":
    case "propTGPTN":
    case "taTGPTN":
        $major_number = 5;
        break;
    case "taTGPR":
    case "jurTGPR":
    case "lapTGPR":
    case "propTGPR":
    case "taTGPR":
        $major_number = 8;
        break;
    case "tesMTTE":
        $major_number = 9;
        break;
    case "tesMTRTM":
        $major_number = 10;
        break;
    case "jurDosen":
    case "tesDosen":
        $major_number = 11;
        break;
    
    default:
        $major_number = 0;
  }

  switch ($tipe_upload) {
    case "taTIK":
    case "taAN":
    case "taTM":
    case "taTS":
    case "taTE":
    case "taA":
    case "taTGPTN":
    case "taTGPR":
        $thesis_number = 1;
        break;
    case "jurTIK":
    case "jurAN":
    case "jurTM":
    case "jurTS":
    case "jurTE":
    case "jurA":
    case "jurTGPTN":
    case "jurTGPR":
    case "jurDosen":
        $thesis_number = 2;
        break;
    case "lapTIK":
    case "lapAN":
    case "lapTM":
    case "lapTS":
    case "lapTE":
    case "lapA":
    case "lapTGPTN":
    case "lapTGPR":
        $thesis_number = 3;
        break;
    case "propTIK":
    case "propAN":
    case "propTM":
    case "propTS":
    case "propTE":
    case "propA":
    case "propTGPTN":
    case "propTGPR":
        $thesis_number = 4;
        break;
    case "tesMTTE":
    case "tesMTRTM":
    case "tesDosen":
        $thesis_number = 5;
        break;
    default:
        $thesis_number = 0;
  }
  
    $search = str_replace(",", "|", $_POST["query"]);
    $query = $dbs->query("SELECT thesis_title,thesis_file_url FROM thesis 
        WHERE thesis_title REGEXP '".$search."' AND thesis_type=" .$thesis_number ." AND member_major=" .$major_number ." ORDER BY time_uploaded DESC");
}

if ($query->num_rows < 1) {
    exit();
}

$data = array();

while($row = $query->fetch_assoc())
{
 $data[] = $row;
}

// encode to JSON array
if (!function_exists('json_encode')) {
    die();
}

echo json_encode($data);

?>