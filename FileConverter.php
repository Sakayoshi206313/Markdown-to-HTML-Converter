<?php

if($argc != 4) {
    echo "使用例 : php FileConverter.php markdown <input.md> <output.html>\n";
    exit(1);
}

$action = $argv[1];
$inputmd = $argv[2];
$outputhtml = $argv[3];

if($action === 'markdown') {
    $inputmdfile = file_get_contents($inputmd);
    if($inputmdfile === false) {
        exit(1);
    }
    //Composerのオートローダーを読み込む
    require "vendor/autoload.php";

    // Parsedownクラスのインスタンスを作成
    $parsedown = new Parsedown();

    // マークダウンをHTMLに変換
    $htmlContent = $parsedown->text($inputmdfile);

    file_put_contents($outputhtml,$htmlContent);
}
