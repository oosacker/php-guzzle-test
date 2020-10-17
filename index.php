<?php

require_once 'MyApiReader.php';

$reader = new MyAPIReader('https://jsonplaceholder.typicode.com');
// $reader->executeGet('/5');


$jsonData = json_encode([
        'title' => 'my title',
        'body' => 'blah blah blah',
        'userID' => '12345'
    ]);

    

$reader->executePost('/posts', $jsonData);

?>
