<?php
require_once DIR . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Загрузка переменных окружения из файла .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Получение значений переменных окружения для подключения к БД
$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_DATABASE'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];

// Подключение к базе данных
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Выполнение запроса к БД
    $stmt = $pdo->query('SELECT * FROM Bike');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }
} catch(PDOException $e) {
    echo "Ошибка подключения к БД: " . $e->getMessage();
}