<body>
<form method="post" action="/load/user_id.php" enctype="multipart/form-data" >
    Имя пользователья: <br>
    <input type = text name="username"><br>
    Выберите загружаемый zip архив: <br>
    <input type="file" name="file" accept=".zip">
    <input type="submit" name="run">
</form>

  <ul>
    <li><a href="list.php">Список</a></li>
    <li><a href="add.php">Добавить</a></li>

  </ul>

<form method="post" action="/generator/Json.php" enctype="multipart/form-data">
    ВВедите число генерируемых массивов: <br>
    <input type="text" name="jsonTree"><br>
    <input type="submit" name="sendCount">
</form>
  
</body>

<?php
//include('WorkDB.php');
//$db = new WorkDB();
//$db->AddJSONtoDB('Alex','out','+994557860043','123456','123456');

