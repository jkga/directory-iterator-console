<?php

/**
* 
*/
class CustomDirectoryIterator
{

	
	function __construct($path,$excluded_files='',$excluded_directory='')
	{
		#path
		$this->path=$path;
		#array exluded files
		$this->excluded_files=split(',', $excluded_files);
		#excluded directory
		$this->excluded_directory=split(',',$excluded_directory);

		//status section
		$this->count=0;
		$this->count_directory=0;
		$this->count_directory_ignored=0;
		$this->count_files_ignored=0;

		//dirty reads
		$this->directory_ignored=[];
		
		
		//get all files directory names
		$this->directory= new RecursiveDirectoryIterator($this->path,RecursiveDirectoryIterator::SKIP_DOTS);
		
		//example result

		#foreach ($this->iterator as $key => $value) {
		#	var_dump($value);
		#};

		$this->iterator= new RecursiveCallbackFilterIterator($this->directory, function ($current, $key, $iterator) {
				
				//iterate inside folder but exclude the directories
				//use relative path to exclude subdirectories 
			   if ($iterator->hasChildren()&&self::IgnoreDirectories($iterator->getPathName())) {
			   			//get directory count
			   			$this->count_directory++;
			   			return true;		
			   }else{

			   		//count directory that has been removed
			   		if(!empty($iterator->getSubPathName())){
			   			
			   			
			   			#all that contains \
						if(strpos($iterator->getSubPathName(), '\\')!=false){
							$this->count_directory_ignored++;
							array_push($this->directory_ignored, $iterator);	
						}

			   			
			   		}
			   }

			   if(!$iterator->isDir()&&self::IgnoreFiles($iterator->getFileName())){
			 		//count total count
			 		$this->count++;

			 		return true;
 
				}else{
					//count ignored files
					if(!$iterator->isDir()){
						$this->count_files_ignored++;
					}
				}

			 //return all files including all those in iterator children()
			 //remove filename in ignore list 
			 #return (!$iterator->isDir())&&self::IgnoreFiles($iterator->getFileName());
			   
		});
	}

	function iterate(){
		
		foreach (new RecursiveIteratorIterator($this->iterator) as  $value) {
			echo ($value->getPathName())."\t".self::hash_file($value->getFileName())."\r\n";

		}

		return $this;

		
		
	}

	function IgnoreDirectories($directoryName){
		//return 0 if it exist | 1 if not
		// if(IgnoreDirectories($directoryName)) return 1
		return (getType(array_search($directoryName, $this->excluded_directory))==='integer')?0:1;
	}

	function IgnoreFiles($fileName){
		//return 0 if it exist | 1 if not
		// if(IgnoreDirectories($directoryName)) return 1
		return (getType(array_search($fileName, $this->excluded_files))==='integer')?0:1;
	
	}

	function hash_file($file_name){
		//convert filename to sha1
		return sha1($file_name);
	}

	function status(){
		#echo $this->count_directory;
		#echo $this->count;
		#echo $this->count_directory_ignored;

		#foreach ($this->directory_ignored as $key => $value) {
			
		#	echo ($value->getSubPathName())."\r\n";
		#}

		//return count

		$data=<<<EOD


Total file parsed:\t$this->count
Ignored Directories:\t$this->count_directory_ignored
Ignored Files:\t\t$this->count_files_ignored

EOD;

echo $data;
		
		return $this;
	}



	 
}

?>