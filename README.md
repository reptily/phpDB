# phpDB
convenient library to work with mysql for php

## Initialization module
```php
require "./vendor/autoload.php";

$config = [
        "host" => "localhost",
        "login" => "root",
        "pwd" => "*******",
        "db" => "php_db_test"
        ];

$DB = new \openWeb\DB($config);
```

Create table
```php
$table = [
                "id" =>[
                        "type"=>"int",
                        "count"=>11,
                        "isNull"=>false,
                        "autoIncrement"=>true
                ],
                "name"=>[]
        ];
$DB->Create("account",$table);
```

Insert value
```php
$DB->account->Insert(["name"=>"user-".time()]);
```

Select all rows and output to array
```php
$row=$DB->account->Select()->getArray();
print_r($row);
```

Select all rows and output to json string
```php
echo $DB->account->Select()->getJson();
```

Select table account only id colum
```php
echo $DB->account->where(["id" => 1])->Select()->getJson();
```

Select table account only id colum
```php
echo $DB->account->field(["id"])->Select()->getJson();
```

Select table account and where id = 1 and id = 3
```php
echo $DB->account->where('or',["id" => 1],["id" => 3])->Select()->getJson();
```

Select table account only id colum and where id = 1
```php
echo $DB->account->field(["name"])->where(["id" => 1])->Select()->getJson();
```

Select table account id and name colum and where id = 1
```php
echo $DB->account->field(["id","name"])->where(["id" => 1])->Select()->getJson();
```

Select table account where id more 1
```php
echo $DB->account->where("id > 1")->Select()->getJson();
```

Inner table blog
```php
echo $DB->account->inner("blog")->on("id","id")->Select()->getJson();
```

Left table blog
```php
echo $DB->account->left("blog")->on("id","id")->Select()->getJson();
```

Update values in table blog
```php
$DB->blog->set(['name' => 'update-'.time()])->where(["id" => 2])->Update();
```
Delete values in table account
```php
$DB->account->where(["id" => 1])->Delete()
```
