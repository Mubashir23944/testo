<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Department;
use App\Models\EmailLog;
use App\Mail\DepartmentEmail;
use Illuminate\Support\Facades\Mail;

class SendDepartmentEmails extends Command
{
    protected $signature = 'send:department-emails';
    protected $description = 'Send emails to users department-wise and log the emails in the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $departments = Department::with('users')->get();

        foreach ($departments as $department) {
            $this->info("Sending emails to users in department: " . $department->name);
            
            foreach ($department->users as $user) {
                $emailData = [
                    'to' => $user->email,
                    'cc' => 'admin@testo.com',
                    'message' => "Hello {$user->name}, this is a message from your department {$department->name}."
                ];

                Mail::send(new DepartmentEmail($emailData));

                EmailLog::create($emailData);

                $this->info("Email sent to: " . $user->email);
            }
        }

        return Command::SUCCESS;
    }
}

// php artisan send:department-emails
