<?php

namespace App\Http\Webhooks;

use DefStudio\Telegraph\DTO\User;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;


class BotFlow extends WebhookHandler
{
    public function start(string $test): void
    {
        $this->chat->message('blaaabla'.$test)->send();
        $this->chat->message("Hey, nice to have you here! I help people stay hydrated. Choose what you want next:")
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Create drinking reminder')->action('createReminder'),
                Button::make('Reset my reminder')->action('deleteReminder'),
                Button::make('Learn more about water')->url('https://www.cdc.gov/healthyweight/healthy_eating/water-and-healthier-drinks.html'),
            ]))->send();
    }

    public function createReminder()
    {
        // keyboard with numeric selection
    }

    public function deleteReminder()
    {
        // sets reminders to 0
    }

    public function testfunc()
    {
        $this->chat->message('show me something!')->send();
    }
}
