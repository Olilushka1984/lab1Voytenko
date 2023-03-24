<?php
// Подключаем файл с параметрами подключения к базе данных
require_once 'dbconnect.php';

// Соединяемся с базой данных
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Проверяем успешность соединения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Формируем запрос к БД
$sql = "SELECT * FROM table_name";

// Выполняем запрос
$result = mysqli_query($conn, $sql);

// Проверяем успешность выполнения запроса
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Выводим данные из таблицы на страницу
echo '<table>';
echo '<tr><th>Column 1</th><th>Column 2</th><th>Column 3</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr><td>' . $row['column1'] . '</td><td>' . $row['column2'] . '</td><td>' . $row['column3'] . '</td></tr>';
}
echo '</table>';

// Закрываем соединение с базой данных
mysqli_close($conn);
?>
