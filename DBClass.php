<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 18.05.2019
 * Time: 9:57
 */

class DBClass
{
    protected  $pdo;

    public function __construct()
    {
        $config = require_once 'config.php';
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'].';charset='.$config['charset'];
        //print $dsn;
        $this->pdo = new PDO($dsn,$config['username'],$config['password']);

    }

    public function AddJSONtoDB($username,$call_type, $number, $time, $call_time)
    {
        $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        //check username in user_list and get id
        $query = "SELECT `id` FROM `userlist` WHERE `name` = :username LIMIT 1 ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['username'=>$username]);
        $user_id = $stmt->fetch();
        if(!$user_id)
        {
            print "Пользователь" . $username . " не существует";
        }
        else
            {

            //print $user_id['id'];
            $_userid = $user_id['id'];
            /*while($user_id=$stmt->fetch())
            {
                print "OK \n";
                print  $user_id['id'];
            }*/
            //print_r( $user_id);

            $callparams = [
                ':user_id' => $_userid,
                ':call_type' => $call_type,
                ':number' => $number,
                ':time' => $time,
                ':call_time' => $call_time
            ];

            
            //insert in call_list
            $query = "INSERT INTO `calllist` (`user_id`,`call_type`,`number`,`time`,`call_time`) VALUE (:user_id,:call_type,
                  :number,:time,:call_time)";

            $dbo = $this->pdo->prepare($query);
            $dbo->execute($callparams);

            $this->PlusCallCount($username);
        }


    }
    // Add calls_count value 1
    public function PlusCallCount($username)
    {
        $query = "UPDATE `userlist` SET `calls_count`=`calls_count`+1 WHERE `name`=:name";
        print $query;
        $dbo = $this->pdo->prepare($query);
        $dbo->execute([':name'=>$username]);
    }

}