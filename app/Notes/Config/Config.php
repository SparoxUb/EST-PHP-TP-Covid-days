<?php

$DB_HOST = getenv('DB_HOST');
$DB_PORT = getenv('DB_PORT');
$DB_USER = getenv('DB_USER');
$DB_PASSWORD = getenv('DB_PASSWORD');
$DB_NAME = getenv('DB_NAME');
if( $DB_HOST )
    return (object) array(
        'host' => $DB_HOST,
        'port'  =>  $DB_PORT,
        'username' => $DB_USER,
        'password' => $DB_PASSWORD,
        'database' => $DB_NAME
    );

return (object) array(
    'host' => 'localhost',
    'port'  =>  '3306',
    'username' => 'root',
    'password' => '',
    'database' => 'gestion_notes'

);

?>