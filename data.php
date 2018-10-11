<?php
$data = [name => 'tagcloud',
    children => [['name' => 'Tag 1', 'size' => 15],
        ['name' => 'Tag 20202', 'size' => 3],
        ['name' => 'Tag 3', 'size' => 7],
        ['name' => 'Tag 4', 'size' => 11],
        ['name' => 'Tag 5', 'size' => 12],
        ['name' => 'Tag 6', 'size' => 22],
        ['name' => 'Tag 7', 'size' => 31],
        ['name' => 'Tag 8', 'size' => 5],
        ['name' => 'Boo', 'size' => 41],
    ]];


// header("Access-Control-Allow-Origin: *");
// echo json_encode($data,JSON_NUMERIC_CHECK);     
header('Content-type: application/json');
echo json_encode($data);
