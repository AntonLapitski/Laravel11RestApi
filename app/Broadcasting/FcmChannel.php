<?php

namespace App\Broadcasting;

use GuzzleHttp\Client;

class OrderChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toFcm($notifiable);
        $client = new Client();
        $response = $client->post('https://fcm.googleapis.com/fcm/send', [
            'headers' => [
                'Authorization' => 'key=YOUR_SERVER_KEY',
                'Content-Type' => 'application/json',
            ],
            'json' => $message,
        ]);
        // Handle the response if needed
        return $response;
    }
}
