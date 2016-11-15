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

### Sample Screenshot

![Temporary logo](https://lh3.googleusercontent.com/MmTERsItlnF_x4zczRTvToZG0LB5VjZgohwvdKe9nsqi9HHg94c8WSi4wWIIvuec0ZXR2sunMAccB_2NWLxlz1jnXUc3CXBNunj7mf1WK58jF2ooKKlW1fgATYPpCtX4ShRcnbe66-vHuogoBmNCmXxtX_Nzalbfb06Ui_bR4Cl3xrVBGscYTlRtrwkh5uiwqwVsezj2cpWqtD16peQxSY28iMEpPBbYu86NDeNY9WcU1onpmtAf_c1w3qW8SIcnnihHt4zeDbZtjeTYZsnpww-_IClyqdC8UGdcwVoF-eUgzxN3OilRRAzDzHRQ8bOzPEv6pgXYHgroSX1IMv6qZcUeIihNEbsP-bNmGMK3Ht0BMuxjVpEDlLVSSmmLA_EXE47LFtE2WTCHzyavpjK_PxwUGIxChbkjKzedBQFDcYJVWwDX24qkEUN70rnia0_TJyKeJEipsF8oyrW4YWyfSWjkqpYo3uB6xE4JHNHbfYfXgPoKkx22z3-3xjqe-kBYrPcXhAgnt0ilgWh-w6bvS68Oy-q_oG7IKv2aLcudIppL4WC8I8YlOC9rcQjp_QpWmtp4ObfujmKBVEfQ77SEt2-EQATwMlyH2L-9OXIlHCm_9b4C=w472-h504-no "CMD Screenshot")

