<?php
if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $email = $_POST['email'] ?? '';
    $title = $_POST['title'] ?? '';
    $category = $_POST['categories'] ?? '';
    $description = $_POST['text'] ?? '';

    if (!empty($email) && !empty($title) && !empty($category) && !empty($description)) {
        $fileName = "Laba 3/Ex_3/categories/$category/{$title}.txt";
        $data = "Email: $email\n Title: $title\n Category: $category\n Description: $description\n";

        $write = fopen($fileName, "w");
        if ($write) {
            fwrite($write, $data);
            fclose($write);
        }
    }
}
header('Location: Helps.php');
exit();