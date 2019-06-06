# phpDB
convenient library to work with mysql for php

## Initialization module
```php
"./vendor/autoload.php";

$config = [
        "host" => "localhost",
        "login" => "root",
        "pwd" => "*******",
        "db" => "php_db_test"
        ];

$DB = new \openWeb\DB($config);
```
