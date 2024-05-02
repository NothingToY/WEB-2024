<?php

require_once __DIR__ . '/vendor/autoload.php';

if ("POST" === $_SERVER["REQUEST_METHOD"]) {
    $email = $_POST["email"];
    $category = $_POST["category"];
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Авторизация и создание клиента для работы с таблицами
    $client = new Google_Client();
    $client->setApplicationName("Andrewito");
    $client->setAuthConfig(__DIR__ . '/credentials.json');
    $client->addScope(Google_Service_Sheets::SPREADSHEETS);
    $client->setAccessType('offline');

    // Создаем объект сервиса
    $service = new Google_Service_Sheets($client);

    // Идентификатор таблицы
    $spreadsheetId = '1Ge1bhF3ACCSfNyHMAtOLw3evtpPzUvTM9ro4c6XSIww';

    // Данные для записи
    $values = [
        [$email, $category, $title, $description]
    ];

    // Запись данных в таблицу
    $range = 'Andrewito';
    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);
    $params = [
        'valueInputOption' => 'RAW'
    ];

    // Записываем данные
    $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
    header("Location: index.php");
    exit;
}