<?php

use Spatie\OneTimePasswords\Actions\CreateOneTimePasswordAction;
use Spatie\OneTimePasswords\Exceptions\InvalidActionClass;
use Spatie\OneTimePasswords\Exceptions\InvalidConfig;
use Spatie\OneTimePasswords\Support\Config;

it('can get the model', function () {
    $model = Config::oneTimePasswordModel();

    expect($model)->toBeString();
});

it('will fail when a wrong model is configured', function () {
    updateConfig('one-time-passwords.model', stdClass::class);

    Config::oneTimePasswordModel();
})->throws(InvalidConfig::class);

it('can get the notification class', function () {
    $notification = Config::oneTimePasswordNotificationClass();

    expect($notification)->toBeString();
});

it('will fail when a wrong notification is configured', function () {
    updateConfig('one-time-passwords.notification', stdClass::class);

    Config::oneTimePasswordNotificationClass();
})->throws(InvalidConfig::class);

it('can get an action class', function () {
    $action = Config::getAction('create_one_time_password', CreateOneTimePasswordAction::class);

    expect($action)->toBeInstanceOf(CreateOneTimePasswordAction::class);
});

it('will fail when a wrong action is configured', function () {
    updateConfig('one-time-passwords.actions.create_one_time_password', stdClass::class);

    Config::getAction('create_one_time_password', CreateOneTimePasswordAction::class);
})->throws(InvalidActionClass::class);
