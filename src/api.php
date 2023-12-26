<?php
function callOpenAI($text, $type) {
    $prompt = "Extract {$type} names from the given text. {$text}";

	file_put_contents("test.json", json_encode($prompt), FILE_APPEND | LOCK_EX);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array(
        'prompt' => $prompt, 
        'max_tokens' => 60,
        'model' => 'text-davinci-003' // specify the model here
    )));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer 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'
    ));

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    $result = json_decode($result, true);
    return explode(",", trim($result['choices'][0]['text']));
}
?>
