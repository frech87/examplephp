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

    function __construct($_jsonTree = 1)
    {

            $this->jsonTree=$_jsonTree;

    }

    function createArray()
    {
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


        print_r($call_list);

    }

}
$jsonTree = $_POST['jsonTree'];
$_createJson = new createJson($jsonTree);
$_createJson->createArray();