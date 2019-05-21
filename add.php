<body>
<form method="post" action="add.php" enctype="multipart/form-data">
    Имя пользователья:<br>
    <input type="text" name="name"><br>
    <input type="submit" name="save"><br>
</form>
</body>

<?php
include ("DBClass.php");
$db = new DBClass();

$username = $_POST['name'];
$db->AddUser(trim($username));

?>