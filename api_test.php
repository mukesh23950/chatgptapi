<?php
require_once 'config.php';

function testChatGPTAPI($apiKey) {
    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ];

    $data = [
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            [
                'role' => 'user',
                'content' => 'Hello, this is a test message.'
            ]
        ]
    ];

    $ch = curl_init(OPENAI_API_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        return ['success' => false, 'message' => 'Curl Error: ' . $error];
    }

    if ($httpCode === 200) {
        return ['success' => true, 'message' => 'API is working correctly!', 'response' => json_decode($response, true)];
    } else {
        return ['success' => false, 'message' => 'API Error: ' . $response];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $apiKey = $_POST['api_key'] ?? '';
    $result = testChatGPTAPI($apiKey);
    header('Content-Type: application/json');
    echo json_encode($result);
    exit;
}
