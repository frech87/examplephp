<?php

include ('DBClass.php');

$db = new DBClass();
$db->SelectUserList();
?>
<body>
<ul>
    <li><a href = "../index.php" >Назад</li>
</ul>
</body>
