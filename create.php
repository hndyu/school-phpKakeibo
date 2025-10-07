<?php
    include_once("dbconnect.php");

    $date = $_POST["date"];
    $title = $_POST["title"];
    $amount = $_POST["amount"];
    $type = $_POST["type"];

    $sql = "INSERT INTO records(title, type, amount, date, created_at, updated_at) VALUES (:title, :type, :amount, :date, now(), now())";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":title", $title, PDO::PARAM_STR);
    $stmt->bindParam(":type", $type, PDO::PARAM_STR);
    $stmt->bindParam(":amount", $amount, PDO::PARAM_STR);
    $stmt->bindParam(":date", $date, PDO::PARAM_STR);

    $stmt->execute();

    header("Location: index.php");
?>