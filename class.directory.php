<?php
/**
* 
*/
class CustomDirectoryIterator
{

	
	function __construct($init=[])
	{
		#settings
		$this->show_hidden=isset($init['hidden_directories'])?$init['hidden_directories']:false;
		$this->path=@$init['path'];

		#array exluded files
		$this->excluded_files=split(',', @$init['excluded_files']);
		#excluded input directory
		$this->excluded_input_directory=split(',',@$init['excluded_directories']);
		$this->real_time=isset($init['real_time'])?$init['real_time']:false;
		$this->loading_bar=isset($init['loading_bar'])?$init['loading_bar']:false;

		#parsed excluded directory
		$this->excluded_directory=[];
		self::absoluteDirectory();

		#parsed directories
		$this->parsed_directory=[];


		#status section
		$this->count=0;
		$this->count_directory=0;
		$this->count_directory_ignored=0;
		$this->count_files_ignored=0;
		$this->execution_date=Date('Y/m/d');
		$this->execution_time_start=microtime(true);
		$this->execution_time=0;
		#dirty reads
		$this->directory_ignored=[];
		
		
		#get all files directory names
		$this->directory= new RecursiveDirectoryIterator($this->path,RecursiveDirectoryIterator::SKIP_DOTS);

		#manual filter
		$this->iterator= new RecursiveCallbackFilterIterator($this->directory, function ($current, $key, $iterator) {
				
				#iterate inside folder but exclude the directories
				#use relative path to exclude subdirectories 
			   if ($iterator->hasChildren()) {
					if(self::IgnoreDirectories($iterator->getPathName())){
						#ignore hidden directories
						if(self::IgnoreHiddenDirectories($iterator->getFileName())) return false;
			   			#get directory count
			   			$this->count_directory++;
			   			return true;
			   		}else{

			   			$this->count_directory_ignored++;
						array_push($this->directory_ignored, $iterator);	

			   		}

			   }

			   if(!$iterator->isDir()&&self::IgnoreFiles($iterator->getFileName())){
			 		#count total count
			 		$this->count++;

			 		return true;
 
				}else{
					#count ignored files
					if(!$iterator->isDir()){
						$this->count_files_ignored++;
					}
				}
			   
		});
	}


	function iterate(){
		
		#if not realtime,we may show loading status
		#this must be use only when displaying through console
		if($this->loading_bar){
			echo ("\r\n[Loading . . .Please wait]")."\r\n\n";
		}

		foreach (new RecursiveIteratorIterator($this->iterator) as  $value) {
			#push to parsed directory
			array_push($this->parsed_directory, $value);

			#if realtime display it during iteration process.By using the real_time parameter you may not use the display() funtion
			if($this->real_time){
				echo ($value->getPathName()."\r\n");
			}
		}

		//calculate execution time
		$this->execution_time=microtime(true)-$this->execution_time_start;

		return $this;		
	}

	/**
	*absoluteDirectory
	*add path at the beginning
	*ex. PATH : C:\\xampp
	*ex. DIR  : php\bin
	*aboslute dir : C:\\xampp\php\bin
	*return int
	*/
	function absoluteDirectory(){

		for ($i=0; $i <count($this->excluded_input_directory) ; $i++) { 
			#use backslash for windows
			array_push($this->excluded_directory, $this->path."\\".$this->excluded_input_directory[$i]); 

		}
	}

	function IgnoreDirectories($directoryName){
		#return 0 if it exist | 1 if not
		#if(IgnoreDirectories($directoryName)) return 1
		return (getType(array_search($directoryName, $this->excluded_directory))==='integer')?0:1;
	}

	function IgnoreFiles($fileName){
		#return 0 if it exist | 1 if not
		# if(IgnoreDirectories($directoryName)) return 1
		return (getType(array_search($fileName, $this->excluded_files))==='integer')?0:1;
	}

	function IgnoreHiddenDirectories($fileName){
		if($this->show_hidden===true) return false;
		if(substr($fileName,0,1)) return true;
	}

	function hash_file($file_name){
		#convert filename to sha1
		return sha1($file_name);
	}



	function display(){
		#display all parsed directory
		foreach ($this->parsed_directory as  $key=>$value) {
			echo ($value->getPathName()."\r\n");
		}

		#calculate execution time
		#this will add time for new display
		$this->execution_time=microtime(true)-$this->execution_time_start;

		return $this;
	}


	function status(){
		$data=<<<EOD


Total file parsed:\t$this->count
Total Directories:\t$this->count_directory
Ignored Directories:\t$this->count_directory_ignored
Ignored Files:\t\t$this->count_files_ignored
Script executed in : \t$this->execution_date
Total execution time in seconds(s) : \t$this->execution_time

EOD;
		#return status
		echo $data;
		
		return $this;
	}


	 
}

?>