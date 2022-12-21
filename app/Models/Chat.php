<?php

namespace App\Models;

use DefStudio\Telegraph\Models\TelegraphChat;

/**
 * @property mixed $reminders
 */
class Chat extends TelegraphChat
{
    protected $table = 'telegraph_chats';
    public const GENDER_MALE = 'male';
    public const GENDER_FEMALE = 'female';

}
