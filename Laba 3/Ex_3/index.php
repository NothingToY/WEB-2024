<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 3</title>
</head>
<body>
    <h1>My_Shop</h1>
    <form action="Helps.php" method="post">
        <label for="email">Email</label>
        <label>
            <input type="email" name="email" required>
        </label>
        <label for="title"><br>Title</label>
        <label>
            <input type="text" name="title" required>
        </label><br>
        <label for="categories">Categories</label>
        <label>
            <select name="categories" required>
                <option value="Basketball">Basketball</option>
                <option value="Football">Football</option>
                <option value="Valleyball">Valleyball</option>
            </select>
        </label><br>
        <label for="description">Description:</label><br>
        <label>
            <textarea name="text" rows="8" cols="48" required></textarea>
        </label><br>
        <button type="submit">Confirm</button>
    </form>
    <div id="table" style="text-align: center">
        <table>
            <thead>
            <tr>
                <th>Email</th>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>

    </div>
    <tbody>
    <?php
    $categories = ["Basketball", "Football", "Valleyball"];
    foreach ($categories as $category) {
        $dir = "Laba 3/Ex_3/categories/$category";
        $fileNames = scandir($dir, SCANDIR_SORT_ASCENDING);
        foreach ($fileNames as $fileName) {
            if ($fileName !== '.' && $fileName !== '..') {
                echo '<tr>';
                $filePath = $dir . "/" . $fileName;
                $file = fopen($filePath, "r");
                if ($file) {
                    $fileData = file($filePath);
                    foreach ($fileData as $data) {
                        $values = explode(":", $data);
                        echo "<td>" . $values[1] . "</td>";
                    }
                    fclose($file);
                }
                echo '</tr>';
            }
        }
    }
    ?>
    </tbody>
</div>
<a href="index.php"><h2>Back</h2></a>
</body>
</html>
