<?php

require_once 'sms/sms.ru.php';



define('api_id', '4C261A8D-894F-2764-6F56-37932F2B9FCE');



function send_mult(string $to, string $text, int $postpone, bool $translit) {
    $smsru = new SMSRU(api_id); // Ваш уникальный программный ключ, который можно получить на главной странице

    $data = new stdClass();
    /* Если текст на номера один */
    $data->to = $to; // Номера для отправки сообщения (От 1 до 100 шт за раз). Вторым указан городской номер, по которому будет возвращена ошибка
    $data->text = $text; // Текст сообщения
    
    // $data->from = ''; // Если у вас уже одобрен буквенный отправитель, его можно указать здесь, в противном случае будет использоваться ваш отправитель по умолчанию
    $data->time = time() + $postpone; // Отложить отправку на 7 часов

    if($translit) {
        $data->translit = 1; // Перевести все русские символы в латиницу (позволяет сэкономить на длине СМС)
    }

    $data->test = 1; // Позволяет выполнить запрос в тестовом режиме без реальной отправки сообщения
    // $data->partner_id = '310619'; // Можно указать ваш ID партнера, если вы интегрируете код в чужую систему
    $request = $smsru->send($data); // Отправка сообщений и возврат данных в переменную

    if ($request->status == "OK") { // Запрос выполнен успешно
        foreach ($request->sms as $phone => $sms) { // Перебираем массив отправленных сообщений
            if ($sms->status == "OK") {
                echo "Сообщение на номер $phone отправлено успешно." . '<br>';
                echo "ID сообщения: $sms->sms_id." . '<br>';
            } else {
                echo "Сообщение на номер $phone не отправлено." . '<br>';
                echo "Код ошибки: $sms->status_code." . '<br>';
                echo "Текст ошибки: $sms->status_text." . '<br>';
            }
        }

        echo "Ваш новый баланс: $request->balance";
    } else {
        echo "Ошибка при выполнении запроса." . '<br>';
        echo "Код ошибки: $request->status_code." . '<br>';
        echo "Текст ошибки: $request->status_text." . '<br>';
    }
}

function printBalance() {
    $smsru = new SMSRU(api_id); // Ваш уникальный программный ключ, который можно получить на главной странице
    $request = $smsru->getBalance(); 

    if ($request->status == "OK") { // Запрос выполнен успешно
        echo "Ваш баланс: $request->balance";
    } else {
        echo "Ошибка при выполнении запроса." . '<br>';
        echo "Код ошибки: $request->status_code." . '<br>';
        echo "Текст ошибки: $request->status_text." . '<br>'; 
    }
}

function printLimit() {
    $smsru = new SMSRU(api_id); // Ваш уникальный программный ключ, который можно получить на главной странице
    $request = $smsru->getLimit();

    if ($request->status == "OK") { // Запрос выполнен успешно
        echo "Ваш лимит: $request->total_limit" . '<br>';
        echo "Использовано сегодня: $request->used_today" . '<br>';
    } else {
        echo "Ошибка при выполнении запроса." . '<br>';
        echo "Код ошибки: $request->status_code." . '<br>';
        echo "Текст ошибки: $request->status_text." . '<br>'; 
    }
}

function test() {    
    $smsru = new SMSRU(api_id); // Ваш уникальный программный ключ, который можно получить на главной странице

    $data = new stdClass();
    $data->to = '79514762444';
    $data->text = 'Hello\nворлд'; // Текст сообщения
    // $data->from = ''; // Если у вас уже одобрен буквенный отправитель, его можно указать здесь, в противном случае будет использоваться ваш отправитель по умолчанию
    // $data->time = time() + 1*60; // Отложить отправку на ? секунд
    // $data->translit = 1; // Перевести все русские символы в латиницу (позволяет сэкономить на длине СМС)
    // $data->test = 1; // Позволяет выполнить запрос в тестовом режиме без реальной отправки сообщения
    // $data->partner_id = '1'; // Можно указать ваш ID партнера, если вы интегрируете код в чужую систему
    $sms = $smsru->send_one($data); // Отправка сообщения и возврат данных в переменную

    if ($sms->status == "OK") { // Запрос выполнен успешно
        echo "Сообщение отправлено успешно." . '<br>';
        echo "ID сообщения: $sms->sms_id." . '<br>';
        echo "Ваш новый баланс: $sms->balance" . '<br>';
    } else {
        echo "Сообщение не отправлено." . '<br>';
        echo "Код ошибки: $sms->status_code. " . '<br>';
        echo "Текст ошибки: $sms->status_text." . '<br>';
    }
}
    
?>