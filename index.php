<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/TelegramBot.php';

use \Dejurin\GoogleTranslateForFree;

const TOKEN = '5120451737:AAFEQynxE0tBu1LGrB5lId0VKptHnRV4hXI';

$telegram = new TelegramBot(TOKEN);
$update = $telegram->getWebhookUpdates();

file_put_contents(__DIR__ . '/logs.txt', print_r($update, 1), FILE_APPEND);

$users_id = $update['message']['chat']['id'];
$users_id_callback_query = $update['callback_query']['message']['chat']['id'];
$callback_id = $update['callback_query']['id'];
$users_name = $update['message']['from']['first_name'];
$users_text = $update['message']['text'];
$inline_type = $update['callback_query']['data'];

$telegram->sendMessage([
    'chat_id' => $users_id,
    'text' => "Дибил под именем, <b>{$users_name}</b> написал: <i>{$users_text}</i>",
    'parse_mode' => 'HTML'
]);