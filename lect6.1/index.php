<?php
session_start();

if(isset($_POST['country'])) {
    $_SESSION['country'] = $_POST['country'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выберите страну</title>
</head>
<body>
    <form method="post" action="">
        <label for="country">Выберите вашу страну:</label>
        <select name="country" id="country">
            <option value="Russia">Россия</option>
            <option value="USA">США</option>
            <option value="China">Китай</option>
        </select>
        <input type="submit" value="Отправить">
    </form>
</body>
</html>
