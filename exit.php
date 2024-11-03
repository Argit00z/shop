<?php
    session_start(); 

    session_unset(); 

// Опционально можно также сбросить сессионные данные на сервере
    session_regenerate_id(true);
    header("Location: index.php");
    exit;
?>