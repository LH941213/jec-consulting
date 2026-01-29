<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームデータの取得
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
    $date = date("Y-m-d H:i:s");

    // 保存するデータの作成
    $data = [$date, $name, $email, $message];

    // CSVファイルを開く（追記モード）
    $file = fopen('contact_data.csv', 'a');

    // データの書き込み
    if ($file) {
        fputcsv($file, $data);
        fclose($file);
        
        // 送信完了画面
        echo "<h1>お問い合わせありがとうございました</h1>";
        echo "<p>内容は正常に記録されました。</p>";
        echo "<a href='index.html'>戻る</a>";
    } else {
        echo "エラー：データの保存に失敗しました。";
    }
} else {
    echo "不正なアクセスです。";
}
?>