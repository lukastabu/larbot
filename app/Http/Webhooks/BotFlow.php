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
//        $this->chat->message('blaaabla'.$test)->send();
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
        $this->chat->message("Great! How many glasses a day would you like to intake?")
            ->keyboard(Keyboard::make()->buttons([
                Button::make('5')->action('reminder5'),
                Button::make('10')->action('reminder10'),
                Button::make('Recommended amount')->action('weightQuestion'),
            ]))->send();
    }

    public function reminder5()
    {
//        $this->chat->message("Great! How many glasses a day would you like to intake?")
//            ->keyboard(Keyboard::make()->buttons([
//                Button::make('5')->action('reminder5'),
//                Button::make('10')->action('reminder10'),
//                Button::make('Recommended amount')->action('reminderRecommended'),
//            ]))->send();
    }

    public function reminder10()
    {
    }

    public function weightQuestion()
    {
        // STEP 1: selecting weight range
        $this->chat->message("What's your weight?")
            ->keyboard(Keyboard::make()->buttons([
                Button::make('below 55')->action('weight')->param('min', '40')->param('max', '55'),
                Button::make('56-70')->action('weight')->param('min', '56')->param('max', '70'),
                Button::make('71-85')->action('weight')->param('min', '71')->param('max', '85'),
                Button::make('86-100')->action('weight')->param('min', '86')->param('max', '100'),
                Button::make('over 101')->action('weight')->param('min', '101')->param('max', '120'),
            ]))->send();
    }

    public function weight()
    {
        //save weight into DB and call gender question

    }
    public function genderQuestion()
    {
        // STEP 2: gender
        $this->chat->message("What's your gender?")
            ->keyboard(Keyboard::make()->buttons([
                Button::make('male')->action('male'),
                Button::make('female')->action('female'),
            ]))->send();
    }

    public function gender()
    {
        //save gender into DB and call calculator
    }

    public function calculator()
    {
        //calculate based on saved weight and gender and set reminder
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
