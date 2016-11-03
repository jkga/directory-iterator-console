# directory-iterator-console
Iterate over directories and list all files using php-CLI. This is currently tested only in **Windows** OS.

###Instructions
1. Download and extract the zip file from this repo to your php Webserver
2. Open your CMD
3. Navigate to your php installation folder
4. Run the directory-cli.php    

**In Windows**
```php
C:\xampp\php>php -f C:\\xampp\htdocs\directory-iterator-console\directory-cli.php C:\\xampp "C:\\xampp\xampp_stop.exe,C:\\xampp\xampp_start.exe" "C:\\xampp\php,C:\\xampp\perl"
```

**Parameters**   
* PHP script  

    	C:\\xampp\htdocs\directory-iterator-console\directory-cli.php

* Path

    	C:\\xampp  


* Ignore Files

    	"C:\\xampp\xampp_stop.exe,C:\\xampp\xampp_start.exe"


* Ignore Directories

    	C:\\xampp\php,C:\\xampp\perl

