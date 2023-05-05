<?php

namespace App\Console\Commands;

use App\Models\Todo;
use App\Models\User;
use App\Notifications\TodoPastDue;
use Illuminate\Console\Command;

class SendLateEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lateEmail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends email when todo task is past due.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dateToday = date('Y-m-d');
        $todos = Todo::select('user_id')->where('deadline', '=', $dateToday)->get();
        $users = User::select()->whereIn('id', $todos)->get();

        $count = 0;
        foreach ($users as $user) {
            $user->notify(new TodoPastDue('You missed a deadline!!!'));
            $count += 1;
        }

        $this->info('Emails Sent: ' . $count);
    }
}
