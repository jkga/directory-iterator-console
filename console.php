<?php
/**
*
*
*/
#require base class
require_once('class.directory.php');

//prevent from accessing through browser
if(!isset($argv)) exit;
#create new object based from given inputs
$a=new CustomDirectoryIterator(@$argv[1],@$argv[2],@$argv[3]);

#display results and show current status in Real Time
$a->iterate(1)->status();


?>