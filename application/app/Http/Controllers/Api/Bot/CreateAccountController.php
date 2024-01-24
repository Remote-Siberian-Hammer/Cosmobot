<?php

namespace App\Http\Controllers\Api\Bot;

use App\Http\Controllers\Controller;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Types\Keyboard\ReplyKeyboardMarkup;
use SergiX44\Nutgram\Telegram\Types\Keyboard\KeyboardButton;

class CreateAccountController extends Controller
{
    public static function start(Nutgram $bot)
    {
        return $bot->sendMessage(text: 'Привет!\nЯ бот менеджер Cosmobot - профессиональный конструктор чат-ботов для бизнеса!\n\nУ меня есть кнопочное меню вместо клавиатуры, где вы можете выбрать то, что вас интересует:\n
        🤖 Если вы уже готовы создать свой первый бот-шедевр, тогда переходите в конструктор с помощью кнопки «Перейти в конструктор». Настоятельно рекомендую делать это исключительно с ПК или ноутбука, так как конструктор не адаптирован к мобильным устройствам (имеет слишком широкий функционал в своем арсенале)\n
        📖 Если еще не готовы создавать ботов, тогда приглашаем пройти бесплатный курс "Как создать Telegram-бот", который поможет быстро разобраться с функционалом конструктора Botmaker. После прохождения курса вы точно будете готовы создать свой первый чат-бот 👌\n
        🛎 Если вы не хотите разбираться в конструкторе, но вам всё равно нужен Telegram-бот, то вы можете заказать разработку чат-бота у нашей команды профессионалов через кнопку "Заказать бота"',
        reply_markup: ReplyKeyboardMarkup::make()
            ->addRow(
                KeyboardButton::make('Авторизоваться'),
            )->addRow(
                KeyboardButton::make('В конструктор'),
                KeyboardButton::make('Как создать Telegram-бот'),
            )->addRow(
                KeyboardButton::make('Заказать бота'),
            ));
    }
    public static function getUser(Nutgram $bot)
    {
        //TODO: Сделать добавление юзера
        return $bot->sendMessage(text: 'Ваши данные: ');
    }
}
