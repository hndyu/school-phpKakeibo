<?php
    include_once("dbconnect.php");
    include_once("functions.php");

    $id = $_GET["id"];

    $sql = "SELECT * FROM records WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $record = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPで簡単家計簿</title>
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha256-+IZRbz1B6ee9mUx/ejmonK+ulIP5A5bLDd6v6NHqXnI=" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <header class="mb-5">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a href="index.php" class="navbar-brand">PHPで簡単家計簿</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ml-md-auto" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-md-auto">
                        <li class="nav-item active">
                            <a href="createForm.php" class="nav-link">追加</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <form action="update.php" method="post" class="m-5">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <p class="alert alert-primary" role="alert">編集フォーム</p>
            <div class="form-group">
                <label for="date">日付</label>
                <input type="date" name="date" id="date" class="form-control" value="<?= h($record["date"]); ?>">
            </div>
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= h($record["title"]); ?>">
            </div>
            <div class="form-group">
                <label for="amount">金額</label>
                <input type="number" name="amount" id="amount" class="form-control" value="<?= h($record["amount"]); ?>">
            </div>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input type="radio" name="type" id="income" class="form-check-input" value="0"<?= h($record["type"]) === "0" ? " checked" : ""; ?>>
                    <label for="income" class="form-check-label">収入</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="type" id="spending" class="form-check-input" value="1"<?= h($record["type"]) === "1" ? " checked" : ""; ?>>
                    <label for="spending" class="form-check-label">支出</label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">編集</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha256-GRJrh0oydT1CwS36bBeJK/2TggpaUQC6GzTaTQdZm0k=" crossorigin="anonymous"></script>
</body>
</html>