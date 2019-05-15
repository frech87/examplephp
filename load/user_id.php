<?php

    $zip = new ZipArchive();
    $zip_status = $zip->open($_FILES['file']['tmp_name']); //открыть файл

    if($zip_status == true)
    {
        print 'zip is open';
        if($zip->setPassword('1234'))  //установить пароль
        {
            $zip_name = $zip->getNameIndex(0);
            print $zip_name ;
            $zip->extractTo("../upload/");  //извлечь в папку

            $json_file_path = '../upload/' . $zip_name;
            echo "<br>";
            print $json_file_path;
            $json = file_get_contents($json_file_path);

            echo "<br>";
            //$firstsubstring = substr($json,15,strpos($json,'},')-14);
            //var_dump( $firstsubstring);

            //print_r($json);

            echo "<br>";
            //var_dump(fixJsonString($json));
            //$json_utf = utf8_decode(fixJsonString($json));
            //var_dump($json_utf);
            $json_data=json_decode(fixJsonString($json), true);
            //var_dump($json_data);
            $json_errors = array(
                JSON_ERROR_NONE => 'No error has occurred',
                JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded',
                JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
                JSON_ERROR_SYNTAX => 'Syntax error',
                JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded.',
            );
            echo 'Last error : ', $json_errors[json_last_error()], PHP_EOL, PHP_EOL;
            echo  "<br>";
            $count = count($json_data["call_list"]);
            //echo $count . "<br";
            //var_dump($json_data["call_list"][0]);
            echo  "<br>";

            for ($i=0; $i < $count; $i++)
            {
                foreach ($json_data["call_list"][$i] as $key=>$value)
                {
                    echo $key . "=>" . $value;
                    echo "<br>";
                }
                //echo "call_type {$i}:" . $json_data["call_list"][$i]["call_type"];
                //echo "<br>";
            }





        }
    }
    else
    {
        print 'zip not open';
    }


?>
<?php
function fixJsonString($str) {

    $str = str_replace('// time begin call','',$str);
    $str =str_replace('// in seconds time talking','',$str);
    //$str = str_replace(',}','}',$str);
    return $str;
}
?>