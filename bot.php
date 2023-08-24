<?php
require_once('vendor/autoload.php'); // Подключение необходимых зависимостей

$data = json_decode(file_get_contents('php://input'), true);

if ($data['event'] === 'ONIMBOTMESSAGEADD') {
    $message = $data['data']['PARAMS']['MESSAGE'];

    if (stripos($message, 'привет') !== false) {
        $keyboard = [
            [
                'TEXT' => 'Помощь',
                'FUNCTION' => 'help'
            ],
            [
                'TEXT' => 'Связаться с администратором',
                'FUNCTION' => 'contact_admin'
            ]
        ];

        $response = [
            'MESSAGE' => 'Приветствую! Чем я могу помочь?',
            'KEYBOARD' => $keyboard
        ];

        echo json_encode($response);
    }
}

function help() {
    $response = [
        'MESSAGE' => 'Какая помощь вам нужна?'
        // Дополнительная логика для обработки кнопки "Помощь"
    ];

    echo json_encode($response);
}

function contact_admin() {
    $response = [
        'MESSAGE' => 'Свяжитесь с администратором по телефону XXX-XXX-XXXX или по почте admin@example.com'
        // Дополнительная логика для обработки кнопки "Связаться с администратором"
    ];

    echo json_encode($response);
}
