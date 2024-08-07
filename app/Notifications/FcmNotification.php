<?php

class FcmNotification extends Notification
{
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['fcm'];
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toFcm(object $notifiable): array
    {
        return [
            'to' => $notifiable->device_key, //Push token stored and associated to the user
            'notification' => [
                'title' => 'Push Title',
                'body' => 'Push Body',
            ],
        ];
    }
}
