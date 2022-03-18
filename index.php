<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/TelegramBot.php';

use \Dejurin\GoogleTranslateForFree;

const TOKEN = '5120451737:AAFEQynxE0tBu1LGrB5lId0VKptHnRV4hXI';

$telegram = new TelegramBot(TOKEN);
$update = $telegram->getWebhookUpdates();

$users_id = $update['message']['chat']['id'];
$users_id2 = $update['callback_query']['message']['chat']['id'];
$callback_id = $update['callback_query']['id'];
$callback_data = $update['callback_query']['data'];
$users_name = $update['message']['from']['first_name'];
$users_text = $update['message']['text'];
$inline_type = $update['callback_query']['data'];