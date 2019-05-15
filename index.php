<body>
<form method="post" action="/load/user_id.php" enctype="multipart/form-data" >
    Имя пользователья: <br>
    <input type = text name="username"><br>
    Выберите загружаемый zip архив: <br>
    <input type="file" name="file">
    <input type="submit" name="run">
</form>

  <ul>
    <li><a href="list.php">Список</a></li>
    <li><a href="add.php">Добавить</a></li>
  </ul>
  
</body>