<?php

use Carbon\Carbon;

if (!function_exists('customDateFormat')) {
    /**
     * Format the date to 'd M, Y'.
     *
     * @param  string  $date
     * @return string
     */
    function customDateFormat($date)
    {
        return \Carbon\Carbon::parse($date)->format('d M, Y');
    }
}

if (!function_exists('handleBooleanStatus')) {
    /**
     * Handle the status'.
     *
     * @param  string  $status
     * @return string
     */
    function handleBooleanStatus($status)
    {
        return $status == '1' ? 'Active' : 'Inactive';
    }
}

if (!function_exists('customTimeFormat')) {
    /**
     * Format the Time to 'g:i A'.
     *
     * @param  string  $dateTime
     * @return string
     */
    function customTimeFormat($dateTime)
    {
        return Carbon::parse($dateTime)->format('g:i A');

    }
}