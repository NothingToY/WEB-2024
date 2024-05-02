<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andrewito</title>
</head>
<body>
<div id="form">
    <form action="save.php" method="post">
        <label for="email">Email</label>
        <label>
            <input type="email" name = "email" required>
        </label>

        <label for="category">Category</label>
        <label>
            <select name="category">
                <option value="football">football</option>
                <option value="basketball">basketball</option>
                <option value="volleyball">volleyball</option>
                <option value="hockey">hockey</option>
            </select>
        </label>

        <label for="title">Title</label>
        <label>
            <input type="text" name = "title" required>
        </label>

        <label for="description">Description</label>
        <label>
            <textarea name="description" rows="1" cols = "10"></textarea>
        </label>

        <input type="submit" value="Save">
    </form>
    <?php
    // Чтение объявлений из Google Sheets

    require_once __DIR__ . '/vendor/autoload.php'; // Подключаем автозагрузчик Composer

    // Авторизация и создание клиента для работы с гугл таблицами
    $client = new Google_Client();
    $client->setAuthConfig(__DIR__ . '/credentials.json');
    $client->addScope(Google_Service_Sheets::SPREADSHEETS_READONLY);
    $service = new Google_Service_Sheets($client);

    // Идентификатор таблицы
    $spreadsheetId = '1Ge1bhF3ACCSfNyHMAtOLw3evtpPzUvTM9ro4c6XSIww';

    // Диапазон ячеек с данными объявлений
    $range = 'Andrewito';

    // Запрос данных из таблицы
    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    $values = $response->getValues();

    // Вывод данных в таблицу на сайте
    if (!empty($values)) {
        foreach ($values as $row) {
            echo "<br>";
            echo "<tr>";
            echo "Email:";
            echo "<td>{$row[0]}</td> ";
            echo "Category:";
            echo "<td>{$row[1]}</td> ";
            echo "Title:";
            echo "<td>{$row[2]}</td> ";
            echo "Description:";
            echo "<td>{$row[3]}</td> ";
            echo "<br>";
            echo "</tr>";
        }
    }
    ?>
</div>
</body>
</html>