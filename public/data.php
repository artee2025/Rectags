<?php
$data = ['name' => 'tagcloud',
    'children' => [['name' => 'Tag 1', 'size' => 15],
        ['name' => 'Jeff', 'size' => 3],
        ['name' => 'Tag 3', 'size' => 7],
        ['name' => 'Tag 4', 'size' => 9],
        ['name' => 'Tag 5', 'size' => 12],
        ['name' => 'Tag 6', 'size' => 7],
        ['name' => 'Longhorn', 'size' => 14],
        ['name' => 'Tag 8', 'size' => 5],
        ['name' => 'Boo', 'size' => 15],
        ['name' => 'Vooo', 'size' => 20],
        ['name' => 'Gooo', 'size' => 1],
        ['name' => 'Bang', 'size' => 6],
        ['name' => 'Yoo', 'size' => 20],
    ]];


// header("Access-Control-Allow-Origin: *");
// echo json_encode($data,JSON_NUMERIC_CHECK);     
header('Content-type: application/json');
echo json_encode($data);
