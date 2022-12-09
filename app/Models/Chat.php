<?php

namespace App\Models;

use DefStudio\Telegraph\Models\TelegraphChat;

class Chat extends TelegraphChat
{
    protected $table = 'telegraph_chats';
    public const GENDER_MALE = 'male';
    public const GENDER_FEMALE = 'female';

}
