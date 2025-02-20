<?php

$config = include 'config.php';
$botToken = $config['api_token'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Убедитесь, что данные получены
    if (isset($_POST['name'], $_POST['phones'][0]['phone'], $_POST['form'], $_POST['query'], $_POST['ip'], $_POST['comment'])) {
        // Получение данных из формы
        $name = htmlspecialchars($_POST['name']);
        $phone = htmlspecialchars($_POST['phones'][0]['phone']);
        $form = htmlspecialchars($_POST['form']);
        $query = htmlspecialchars($_POST['query']);
        $ip = htmlspecialchars($_POST['ip']);
        $comment = htmlspecialchars($_POST['comment']);

        // Ваш токен бота и Chat ID
        $chatId = '6972584731';

        // Формирование сообщения
        $message = "Форма: $form\n";
        $message .= "Имя: $name\n";
        $message .= "Телефон: $phone\n";
        $message .= "Запрос: $query\n";
        $message .= "IP: $ip\n";
        $message .= "Комментарий: $comment";

        // URL для отправки сообщения
        $url = "https://api.telegram.org/bot$botToken/sendMessage";

        // Параметры запроса
        $data = [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'HTML'
        ];

        // Инициализация cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Выполнение запроса
        $response = curl_exec($ch);

        // Проверка на ошибки
        if ($response === false) {
            echo 'Ошибка при отправке сообщения: ' . curl_error($ch);
        } else {
            $responseData = json_decode($response, true);
            if ($responseData['ok']) {
                echo 'Сообщение успешно отправлено';
            } else {
                echo 'Ошибка: ' . $responseData['description'];
            }
        }

        // Закрытие cURL
        curl_close($ch);
    } else {
        echo 'Ошибка: не все данные формы получены.';
    }
} else {
    echo 'Неверный метод запроса.';
}
?>