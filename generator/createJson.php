<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 22.05.2019
 * Time: 23:29
 */
//создать json файл с рандомными значениями в zip архиве

namespace Json_Zip;


class createJson
{
    private $call_type;
    private $array_call_type=array("in","out");
    private $number;
    private $call_time;
    private $time;

    private $jsonTree;

    private $_calllist = array();

    function __construct($_jsonTree = 1)
    {

            $this->jsonTree=$_jsonTree;

    }

    function createArray()
    {

        // создает массив и кодирует в json
        $call_list = array();

        for ($i=0;$i<$this->jsonTree;$i++)
        {
            $this->call_type = $this->array_call_type[array_rand($this->array_call_type)];
            $this->number="+". rand(300000000,400000000);
            $this->call_time = rand(1,100);
            $this->time = rand(100000000,200000000);

            $arrayJson["call_type"] = $this->call_type;
            $arrayJson["number"] = $this->number;
            $arrayJson["time"] = $this->time;
            $arrayJson["call_time"] = $this->call_time;

            $call_list[]=$arrayJson;
        }

        $this->_calllist["call_list"] = $call_list;
        //print_r($call_list);
        //return
        return json_encode($this->_calllist);



    }

    //архивировать файл
    function createZip($file,$password)
    {
        //$config = require_once '../config.php';
        //$password = $config['username'];
        $zip = new \ZipArchive();
        $zipfilename = $file.".zip";
        if($zip->open($zipfilename,\ZipArchive::CREATE)===true)
        {
            $zip->addFile($file.'.json','meta.json');

            $zip->setEncryptionName('meta.json',\ZipArchive::EM_AES_256,$password);
            $zip->close();
        }



    }

}
