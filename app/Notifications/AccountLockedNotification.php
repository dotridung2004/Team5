<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountLockedNotification extends Notification
{
    use Queueable;

    public $reason;

    /**
     * Create a new notification instance.
     */
    public function __construct($reason)
    {
        $this->reason = $reason; // Lý do khóa tài khoản được truyền vào
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['mail']; // Gửi qua email, có thể thêm 'sms' nếu cần
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Tài khoản của bạn đã bị khóa')
            ->line('Tài khoản của bạn đã bị khóa bởi quản trị viên.')
            ->line('Lý do: ' . $this->reason)
            ->line('Vui lòng liên hệ quản trị viên để biết thêm chi tiết.');
    }

    /**
     * Get the array representation of the notification (nếu cần gửi qua kênh khác như database).
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Tài khoản của bạn đã bị khóa.',
            'reason' => $this->reason,
        ];
    }
}
