<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 23.05.2019
 * Time: 13:26
 */


require_once 'createJson.php';
$config = require_once '../config.php';
use Json_Zip\createJson as createJson;

$jsonTree = $_POST['jsonTree'];
$_createJson = new createJson($jsonTree);

print "JSON создан:<br>";

print "<br>Путь сохранение:";
$filename = rand(10000,99999);
$savefilepath = $config['savefilepath']."/meta".$filename;
print $savefilepath."<br>";

file_put_contents($savefilepath.".json",$_createJson->createArray()); //создать файл

$password = $config['zippassword']; // установить пароль
$_createJson->createZip($savefilepath,$password);
?>
<body>
<ul>
    <li><a href = "../index.php" >Назад</li>
</ul>
</body>








