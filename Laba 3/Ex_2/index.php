<?php
session_start();
if ("POST"==$_SERVER["REQUEST_METHOD"])
{
    $surname = $_POST["surname"];
    $name = $_POST["name"];
    $age = $_POST["age"];

    $_SESSION["surname"] = $surname;
    $_SESSION["name"] = $name;
    $_SESSION["age"] = $age;

    header("Location: disp.php");
    exit();
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <title>Word and Character Сounter</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Form
    </title>
</head>

<body>
    <form method="post">
        <label>
            <textarea name="text" rows="4" cols="40"></textarea><br>
        </label>
        <input type="submit" name="submit" value="Посчитать">
    </form>

<?php

if(isset($_POST['submit']) and (!empty($_POST['text'])))
    {
    $text = $_POST['text'];
    $word_count = str_word_count($text);
    $char_count = strlen($text);
    echo "<br> Кол-во слов тексте: $word_count </br>";
    echo "Кол-во букв тексте: $char_count";
    }

else
    {
        echo "Напишите и посчитайте !";
    }
?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="surname">Фамилия:</label>
        <input type="text" id="surname" name="surname" required><br>
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="age">Возраст:</label>
        <input type="text" id="age" name="age" required><br>
        <input type="submit" value="Отправить данные">
    </form>
</body>

</html>