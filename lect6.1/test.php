<?php
session_start(); // Начинаем сессию

// Проверяем, установлена ли страна в сессии
if(isset($_SESSION['country'])) {
    echo "Ваша страна: " . $_SESSION['country'];
} else {
    echo "Страна не выбрана.";
}
