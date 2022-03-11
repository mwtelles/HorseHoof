<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NovaOcorrencia extends Notification
{
    use Queueable;

    private $ocorrencia;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ocorrencia)
    {
        $this->ocorrencia = $ocorrencia;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'ocorrencia_id' => $this->ocorrencia->id,
        ];
    }
}
