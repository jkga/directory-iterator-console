# directory-iterator-console
Iterate over directories and list all files using php-CLI. This is currently tested only in **Windows** OS.

###Instructions
1. Download and extract the zip file from this repo to your php Webserver
2. Open your CMD
3. Navigate to your php installation folder
4. Run the directory-cli.php    

**Windows**   
Please enclose with **"  "** all parameters containing special or whitespace character.This must be applied also in multi-valued parameters.

```php
C:\xampp\php>php -f C:\\xampp\htdocs\directory-iterator-console\console.php C:\\xampp "xampp_stop.exe,xampp_start.exe" "php,perl"
```


**PHP script** 

    	C:\\xampp\htdocs\directory-iterator-console\console.php

**Path**

    	C:\\xampp  


**Ignored Files**   
This will ignore all files containing these filenames

    	"xampp_stop.exe,xampp_start.exe"


**Ignored Directories**   
In Windows, this will be converted automatically to absolute path and will be ignored during reading process.  
For example, directories below will be converted to C:\\xampp\php and C:\\xampp\perl

    	"php,perl"

