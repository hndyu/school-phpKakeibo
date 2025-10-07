<?php
    include_once("dbconnect.php");

    $date = $_POST["date"];
    $title = $_POST["title"];
    $amount = $_POST["amount"];
    $type = $_POST["type"];
    $id = $_POST["id"];

    $sql = "UPDATE records SET title = :title, type = :type, amount = :amount, date = :date, updated_at = now() WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":title", $title, PDO::PARAM_STR);
    $stmt->bindParam(":type", $type, PDO::PARAM_INT);
    $stmt->bindParam(":amount", $amount, PDO::PARAM_INT);
    $stmt->bindParam(":date", $date, PDO::PARAM_STR);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    $stmt->execute();

    header("Location: index.php");
    exit;