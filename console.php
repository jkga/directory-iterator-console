<?php
/**
*
*
*/
#require base class
require_once('class.directory.php');

//prevent from accessing through browser
if(!isset($argv)) exit;
#settings

$init=[
'autorun'=>true,
'path'=>@$argv[1],
'excluded_files'=>@$argv[2],
'excluded_directories'=>@$argv[3],
'hidden_directories'=>false,
'real_time'=>true,
'loading_bar'=>true,
'status'=>true
];

#create new object based from given inputs
$a=new CustomDirectoryIterator($init);



?>