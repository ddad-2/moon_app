<?php
$servername = "localhost";  // MySQLサーバーのホスト名
$username = "root";  // MySQLユーザー名
$password = "root";  // MySQLパスワード
$dbname = "abnormality_db";  // データベース名

// MySQLに接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続エラーチェック
if ($conn->connect_error) {
    die("接続失敗: " . $conn->connect_error);
}

// データ取得
$sql = "SELECT * FROM work_rates ORDER BY abnormality_id, level";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アブノーマリティ作業倍率</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">アブノーマリティ作業倍率一覧</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>レベル</th>
            <th>本能</th>
            <th>洞察</th>
            <th>愛着</th>
            <th>抑圧</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["abnormality_id"]. "</td>
                        <td>" . $row["level"]. "</td>
                        <td>" . $row["instinct"]. "</td>
                        <td>" . $row["insight"]. "</td>
                        <td>" . $row["attachment"]. "</td>
                        <td>" . $row["repression"]. "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>データなし</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>