<?php
    if(!empty($_POST['username']) && !empty($_FILES['file']['tmp_name'])) {
        include('../DBClass.php');
        $db = new DBClass();
        $username = $_POST['username'];
        //print $username;
        $unzip = new Unzip();


        $json = file_get_contents($unzip->unzipfile($_FILES['file']['tmp_name'], '1234'));

        echo "<br>";


        echo "<br>";

        $json_data = json_decode(fixJsonString($json), true);
        //var_dump($json_data);
        /*$json_errors = array(
            JSON_ERROR_NONE => 'No error has occurred',
            JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded',
            JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
            JSON_ERROR_SYNTAX => 'Syntax error',
            JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded.',
        );
        echo 'Last error : ', $json_errors[json_last_error()], PHP_EOL, PHP_EOL;
        echo  "<br>";*/
        //$count = count($json_data["call_list"]);
        //echo $count . "<br";
        //var_dump($json_data["call_list"][0]);
        echo "<br>";

        for ($i = 0; $i < count($json_data["call_list"]); $i++) {
            //print_r($json_data["call_list"][$i]);
            $db->AddJSONtoDB(trim($username), $json_data["call_list"][$i]["call_type"], $json_data["call_list"][$i]["number"], $json_data["call_list"][$i]["time"],
                $json_data["call_list"][$i]["call_time"]);
            /*foreach ($json_data["call_list"][$i] as $key=>$value)
            {
                echo $key . "=>" . $value;
                echo "<br>";

            }*/
            //echo "call_type {$i}:" . $json_data["call_list"][$i]["call_type"];
            //echo "<br>";
        }


    }
    else
    {
        alert("Правильно заполните поля");
    }


function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>
    <body>
    <ul>
        <li><a href = "../index.php" >Назад</li>
    </ul>
    </body>
<?php
function fixJsonString($str) {

    $str = str_replace('// time begin call','',$str); //удалить комментарии, сделать под json формат
    $str =str_replace('// in seconds time talking','',$str);
    //$str = str_replace(',}','}',$str);
    return $str;
}

class Unzip
{
    public function unzipfile ($filepath, $password)
    {
        $zip = new ZipArchive();
        $zip_status = $zip->open($filepath); //открыть файл

        if($zip_status == true)
        {
            //print 'zip is open';
            if ($zip->setPassword($password))  //установить пароль
            {
                $zip_name = $zip->getNameIndex(0);
                //print $zip_name;
                $zip->extractTo("../upload/");  //извлечь в папку

                return $json_file_path = '../upload/' . $zip_name;
            }
        }
        else
        {
            print 'zip not open';
        }
    }
}
?>