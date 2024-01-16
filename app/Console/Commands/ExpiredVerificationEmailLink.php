<?php

namespace App\Console\Commands;

use App\Models\VerifyEmailModel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ExpiredVerificationEmailLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expired-verification-email-link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'command that deletes verification email records more than 3 days old';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now();
        $subtract_days = $today->subDay(3)->format('Y-m-d');
        $verify_email_model = VerifyEmailModel::where("created_at", "<=", $subtract_days)->get();
        foreach ($verify_email_model as $key => $value) {
            $value->delete();
        }
    }
}
