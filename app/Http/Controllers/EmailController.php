<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailsToUsers;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Send emails to users department or location-wise.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendEmails(Request $request)
    {
        $validated = $request->validate([
            'filter_type' => 'required|in:department,location',
            'filter_value' => 'required|integer',
            'message' => 'required|string',
        ]);

        SendEmailsToUsers::dispatch(
            $validated['filter_type'],
            $validated['filter_value'],
            $validated['message']
        );

        return response()->json(['status' => 'Emails dispatched successfully!']);
    }
}