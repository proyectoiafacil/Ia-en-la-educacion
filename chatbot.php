<?php
header('Content-Type: application/json');

$apiKey = 'AIzaSyBgL2dlctunR6HZNSYw4COajByt0rXCb4g';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['message']) || empty($input['message'])) {
        echo json_encode(['error' => 'Mensaje vacío']);
        exit;
    }

    $message = $input['message'];

    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$apiKey";

    $data = [
        "contents" => [
            [
                "parts" => [
                    ["text" => $message]
                ]
            ]
        ]
    ];

    $payload = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo json_encode(['error' => curl_error($ch)]);
        curl_close($ch);
        exit;
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        echo json_encode(['error' => "Error HTTP $httpCode", 'response' => $response]);
        exit;
    }

    $result = json_decode($response, true);

    // EXTRAER SOLO EL TEXTO, NO EL ARRAY COMPLETO:
    $answer = $result['candidates'][0]['content']['parts'][0]['text'] ?? "No se pudo obtener respuesta";

    echo json_encode(['answer' => $answer]);
    exit;
}

echo json_encode(['error' => 'Método no permitido']);
?>
