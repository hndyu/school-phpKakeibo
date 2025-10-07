<?php
    include_once("dbconnect.php");
    include_once("functions.php");

    $sql = "SELECT * FROM records";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $records = $stmt->fetchAll();
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

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-fixed">
                        <thead class="thead-dark">
                            <tr>
                                <th class="col-2" scope="col">日付</th>
                                <th class="col-3" scope="col">項目</th>
                                <th class="col-2" scope="col">収入</th>
                                <th class="col-2" scope="col">支出</th>
                                <th class="col-3" scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records as $record): ?>
                            <tr>
                                <td class="col-2"><?php echo h($record["date"]); ?></td>
                                <td class="col-3"><?php echo h($record["title"]); ?></td>
                                <td class="col-2"><?php echo h($record["type"]) === "0" ? h($record["amount"]) : ""; ?></td>
                                <td class="col-2"><?php echo h($record["type"]) === "1" ? h($record["amount"]) : ""; ?></td>
                                <td class="col-3">
                                    <a href="editForm.php?id=<?php echo h($record["id"]); ?>" class="btn btn-success text-light">編集</a>
                                    <a href="delete.php?id=<?php echo h($record["id"]); ?>" class="btn btn-danger text-light">削除</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha256-GRJrh0oydT1CwS36bBeJK/2TggpaUQC6GzTaTQdZm0k=" crossorigin="anonymous"></script>
</body>
</html>