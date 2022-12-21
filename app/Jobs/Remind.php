<?php

namespace App\Jobs;

use App\Models\Chat;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Remind implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Chat $chat;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Chat $chatForReminder)
    {
        $this->chat = $chatForReminder;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle():void
    {
        $this->chat->message('have a nice drink')->send();

        if (in_array($this->chat->reminders, [0, null], true)) {
            return;
        }

        $reminderByHour = (int) (86400/$this->chat->reminders);

        self::dispatch($this->chat)->delay(now()->addSeconds($reminderByHour));
    }
}
