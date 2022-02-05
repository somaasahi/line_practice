GO!
<?php
lineBroadcast('send message');

function lineBroadcast($text){
    $channelToken = 'uwC8yrX2cqjZ24K2hYt1BfF6lUTnP6cPveEjU2Jrl756cdbwrITkI5C0ty76h/Itcqc1TZlFLlLp8pbmJQ3gsguniu4/x+XdVk6G3ADAMqEl0MAuGm6F4X9Uq1RzM5IcaN+fnPGT2FJxnJzVsXpeAAdB04t89/1O/w1cDnyilFU=';
    $headers = [
        'Authorization: Bearer ' . $channelToken,
        'Content-Type: application/json; charset=utf-8',
    ];

    $post = [
        'messages' => [
            [
                'type' => 'text',
                'text' => $text,
            ],
        ],
    ];

    $url = 'https://api.line.me/v2/bot/message/broadcast';
    $post = json_encode($post);

    $ch = curl_init($url);
    $options = [
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_BINARYTRANSFER => true,
        CURLOPT_HEADER => true,
        CURLOPT_POSTFIELDS => $post,
    ];
    curl_setopt_array($ch, $options);

    $result = curl_exec($ch);
    $errno = curl_errno($ch);
    if ($errno) {
        print_r($errno);
    }else{
        echo 'SUCCESS';
    }
}
?>
