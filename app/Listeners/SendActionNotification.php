<?php

namespace App\Listeners;

use App\Models\Activity;
use App\Models\UserDevice;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\MessageData;
use Kreait\Firebase\Messaging\MulticastSendReport;
use Kreait\Firebase\Messaging\MulticastSendResponse;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class SendActionNotification
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\PostActionNotification  $event
     * @return void
     */
    public function handle($event)
    {
        try {
            $ids = $event->ids;
            $payload = $event->payload;
            $activity = $event->activity;
            $notification = UserDevice::whereIn('user_id', $ids)->get();

            if ($activity) {
                foreach ($ids as $key => $user_id) {
                    $payload['user_id'] = $user_id;
                    Activity::create($payload);
                }
            }

            if ($notification) {

                $devices = UserDevice::join('users as u', 'u.id', '=', 'user_devices.user_id')
                    ->whereIn('user_id', $ids)
                    ->select('user_devices.*')
                    ->get();

                if ($devices->count()) {

                    Log::info($devices);
                    
                    $optionBuilder = new OptionsBuilder();
                    $optionBuilder->setTimeToLive(60 * 20);

                    $notificationBuilder = new PayloadNotificationBuilder(@$payload['title'] ?? ucwords(str_replace('_', ' ', $payload['action'])));
                    $notificationBuilder->setBody(@$payload['body'])
                        ->setSound('default');

                    $dataBuilder = new PayloadDataBuilder();
                    $dataBuilder->addData(['custom' => $payload]);

                    $option = $optionBuilder->build();
                    $notification = $notificationBuilder->build();
                    $data = $dataBuilder->build();
                    
                    $android_dev = $devices->where('device_type', 'android')->pluck(['fcm_token'])->toArray();
                    $ios_dev = $devices->where('device_type', 'ios')->pluck(['fcm_token'])->toArray();
                
                    if (sizeof($android_dev))
                
                    $downstreamResponse = FCM::sendTo($android_dev, $option, $notification, $data);

                    if (sizeof($ios_dev))
                    $downstreamResponse = FCM::sendTo($ios_dev, $option, $notification, $data);

                    $this->handleResponse($downstreamResponse);
                }
            }
        } catch (\Exception $e) {
            Log::info($e);
            return false;
        }
    }

    protected function handleResponse($response)
    {
        Log::info([
            "success" => $response->numberSuccess(),
            "fails" => $response->numberFailure(),
            "numberModification" => $response->numberModification(),
            // return Array - you must remove all this tokens in your database
            "tokensToDelete" => $response->tokensToDelete(),
            // return Array (key : oldToken, value : new token - you must change the token in your database)
            "tokensToModify" => $response->tokensToModify(),
            // return Array - you should try to resend the message to the tokens in the array
            "tokensToRetry" => $response->tokensToRetry(),
            // return Array (key:token, value:error) - in production you should remove from your database the tokens
            "tokensWithError" => $response->tokensWithError(),
        ]);
    }
}