<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 17.05.2019
 * Time: 15:54
 */

class WorkDB
{
    private $conString;

    public function __construct()
    {
       $this->connectToDB();  //connect to database

    }
    private function connectToDB()
    {
        $config = require_once 'config.php';
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'].';charset='.$config['charset'];

        $this->conString= new PDO($dsn, $config['username'], $config['password']);

        return $this;


    }

    public function AddJSONtoDB($user_name,$call_type, $number, $time, $call_time)
    {
        //select user_id from user list

        $query = "SELECT `id` FROM `userlist` WHERE `name`=='$user_name'";
        $selectquery = $this->conString->query($query);
        print_r($selectquery);
        $user_id = $selectquery->fetch();





        // insert to table (calllist) value user_id, call_type, number, time, call_time


        $callparams = [
            ':user_id' =>$user_id,
            ':call_type' => $call_type,
            ':number' => $number,
            ':time' => $time,
            ':call_time' =>$call_time
        ];
        $query = "INSERT INTO `calllist` (`user_id`,`call_type`,`number`,`time`,`call_time`) VALUE (:user_id,:call_type,
                  :number,:time,:call_time)";

        $dbo=$this->conString->prepare($query);
        $dbo->execute($callparams);


    }


}