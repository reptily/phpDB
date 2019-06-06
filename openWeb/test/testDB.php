<?php
error_reporting(E_ALL);
@ini_set('display_errors', true);

require "../../vendor/autoload.php";

$config = [
        "host" => "localhost",
        "login" => "root",
        "pwd" => "*******",
        "db" => "php_db_test"
        ];

$DB = new \openWeb\DB($config);

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

$table = [
                "id" =>[
                        "type"=>"int",
                        "count"=>11,
                        "isNull"=>false,
                        "autoIncrement"=>true
                ],
                "name"=>[]
        ];
$DB->Create("blog",$table);

$DB->account->Insert(["name"=>"user-".time()]);

$DB->blog->Insert([["name"=>"title-1-".time()],["name"=>"title-2-".time()]]);

$row=$DB->account->Select()->getArray();
print_r($row);

echo $DB->account->Select()->getJson();

echo $DB->account->field(["id"])->Select()->getJson();

echo "\n";
echo $DB->account->where(["id" => 1])->Select()->getJson();

echo "\n";
echo $DB->account->where('or',["id" => 1],["id" => 2])->Select()->getJson();

echo "\n";
echo $DB->account->field(["name"])->where(["id" => 1])->Select()->getJson();

echo "\n";
echo $DB->account->field(["id","name"])->where(["id" => 1])->Select()->getJson();

echo "\n";
echo $DB->account->where("id > 1")->Select()->getJson();

echo "\n";
echo $DB->account->where("id > 1")->Select()->getJson();

echo "\n";
echo $DB->account->inner("blog")->on("id","id")->Select()->getJson();

echo "\n";
echo $DB->account->left("blog")->on("id","id")->Select()->getJson();

$DB->blog->set(['name' => 'update-'.time()])->where(["id" => 2])->Update();
?>