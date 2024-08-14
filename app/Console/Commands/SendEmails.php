<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Mail\ReminderEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('emails:send command started');

        $users = User::where('reminder_sent', false)->get();

        if ($users->isEmpty()) {
            Log::info('No users found with reminder_sent = false');
        }

        foreach ($users as $user) {
            Log::info('Sending email to: ' . $user->email);
            Mail::to($user->email)->send(new ReminderEmail($user));
            Log::info('Email sent to: ' . $user->email);
            $user->reminder_sent = true;
            $user->save();
            Log::info('Updated reminder_sent for user: ' . $user->email);
        }

        Log::info('emails:send command completed');

        return 0;
    }
}
