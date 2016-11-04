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
'path'=>@$argv[1],
'excluded_files'=>@$argv[2],
'excluded_directories'=>@$argv[3],
'hidden_directories'=>false,
'real_time'=>false,
'loading_bar'=>true
];

#create new object based from given inputs
$a=new CustomDirectoryIterator($init);

#display results and show current status in Real Time
$a->iterate()->status();


?>