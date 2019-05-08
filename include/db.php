<?php

$connection = mysqli_connect('127.0.0.1', 'root','','ats_db');

if ($connection == false)
{
	echo "Сервер не доступен";
	echo mysqli_connect_error();
	exit();
}
else
{
	echo "Connect To DB";
	}

