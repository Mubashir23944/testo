<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SendEmailsToUsers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filterType;
    protected $filterValue;
    protected $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filterType, $filterValue, $message)
    {
        $this->filterType = $filterType;
        $this->filterValue = $filterValue;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = collect();

        if ($this->filterType === 'department') {
            $users = User::where('dept_id', $this->filterValue)->get();
        } elseif ($this->filterType === 'location') {
            $users = User::whereHas('department', function ($query) {
                $query->where('location_id', $this->filterValue);
            })->get();
        } else {
            Log::error('Invalid filter type provided: ' . $this->filterType);
        }

        if ($users->isEmpty()) {
            Log::info('No users found for the given filter criteria.');
        } else {
            Log::debug('Fetched users for email:', ['users' => $users]);
        }

        foreach ($users as $user) {
            DB::table('email_logs')->insert([
                'to' => $user->email,
                'cc' => 'admin@testo.com',
                'bcc' => null, 
                'message' => $this->message,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}