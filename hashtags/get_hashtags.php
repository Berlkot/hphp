<?php
$db = require ('db.php');
$connect = mysqli_connect($db['host'], $db['username'], $db['password'], $db['database']);


$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['fieldId'])) {
    $fieldId = $data['fieldId'];
    // Далее обрабатываете $fieldId по вашим нуждам
} else {
    // обработка случая, если fieldId отсутствует в данных
}

$sql = "SELECT h.id, h.name FROM hashtags h INNER JOIN hash_connect hc ON h.id = hc.hash_id WHERE hc.field_id = '$fieldId'";
$res = mysqli_query($connect, $sql);

$selectedHashtags = array();
while ($row = $res->fetch_assoc()) {
    $selectedHashtags[] = $row;
}

echo json_encode($selectedHashtags);
