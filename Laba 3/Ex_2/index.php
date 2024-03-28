<!DOCTYPE html>

<html lang="en">

<head>
    <title>Word and Character Сounter</title>
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

</body>

</html>