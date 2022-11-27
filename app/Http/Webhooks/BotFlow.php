<?php

namespace App\Http\Webhooks;

use DefStudio\Telegraph\DTO\User;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;


class BotFlow extends WebhookHandler
{
    protected function handleChatMemberJoined(User $member): void
    {
        $this->chat->message("Hey, {$member->firstName()}! Nice to have you here. I help people stay hydrated. What would you like from me?")
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Create drinking reminder')->action('createReminder'),
                Button::make('Reset my reminder')->action('deleteReminder'),
                Button::make('Learn more about water')->url('https://test.it'),
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

}
