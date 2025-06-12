<?php
$apiKey = 'AIzaSyB4zUBSDDxbcCnXyjh8hWsooj6gQ4bQqGo'; // Pon tu clave API aquí

$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey";

$data = [
    "contents" => [
        [
            "parts" => [
                [
                    "text" => "Explain how AI works in a few words"
                ]
            ]
        ]
    ]
];

$payload = json_encode($data);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "Error cURL: " . curl_error($ch);
} else {
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($httpCode !== 200) {
        echo "Error HTTP: $httpCode\nRespuesta: $response";
    } else {
        $result = json_decode($response, true);
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
}

curl_close($ch);
?>
