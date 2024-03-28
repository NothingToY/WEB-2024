<?php
session_start();
if ("POST"==$_SERVER["REQUEST_METHOD"])
{
    $surname = $_POST["surname"];
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $age = $_POST["age"];

    $_SESSION["surname"] = $surname;
    $_SESSION["name"] = $name;
    $_SESSION["age"] = $age;



    $salary = $_POST["salary"];
    $nationality = $_POST["nationality"];
    $userData = ['name'=>$name, 'age'=>$age, 'surname'=>$surname, 'salary'=>$salary, 'nationality'=>$nationality];
    $_SESSION['userData'] = $userData;

    header("Location: disp.php");
    exit();
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Form
    </title>
</head>
<body>
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