<?php
global $app;
global $container;

use Http\Controllers\HomeController;
use Http\Controllers\BotController;
use http\Controllers\MailingController;
use Http\Controllers\UserController;
use Http\Controllers\Form\UserFormController;
use Http\Controllers\Form\BotFormController;
use Http\Middleware\DMLMiddleware;

require_once __DIR__ . '/config/bootstrap.php';
require_once __DIR__ . '/http/Middleware/DMLMiddleware.php';


$app->get('/', function () use ($container) {
    return $container->get(HomeController::class)->index();
});
$app->with('/auth', function () use ($app, $container) {
    $app->get('/social/telegram/callback', function () use ($container) {
        $container->get(UserFormController::class)->telegram_callback($_GET);
        new DMLMiddleware();
    });
    $app->get('/social/vk/callback', function () use ($container) {
        $container->get(UserFormController::class)->vk_callback($_GET);
        new DMLMiddleware();
    });
});
$app->with('/user', function () use ($app, $container) {
    $app->with('/form', function () use ($app, $container) {
        $app->respond('POST','/logout', function () use ($app, $container) {
            return $container->get(UserFormController::class)->logout();
        });
    });
    $app->get('/login', function () use ($container) {
        return $container->get(UserController::class)->login();
    });
});
$app->with('/bot', function () use ($app, $container) {
    $app->with('/form', function () use ($app, $container) {
        $app->respond('POST','/registration', function () use ($app, $container) {
            return $container->get(BotFormController::class)->registration($_POST);
        });
    });
    $app->get('/constructor', function () use ($container) {
        return $container->get(BotController::class)->get_creator();
    });
});

$app->with('/mailing', function () use ($app, $container) {
    $app->respond('GET','/', function () use ($app, $container) {
        return $container->get(MailingController::class)->index();
    });
    $app->respond('GET','/show', function () use ($app, $container) {
        return $container->get(MailingController::class)->show();
    });
});