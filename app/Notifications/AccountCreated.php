<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AccountCreated extends Notification
{
    use Queueable;

    protected $user;
    protected $temporaryPassword;

    /**
     * Create a new notification instance.
     */
    public function __construct($user, $temporaryPassword)
    {
        $this->user = $user;
        $this->temporaryPassword = $temporaryPassword;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['mail']; // Gửi qua email
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Tài khoản của bạn đã được tạo')
            ->greeting('Xin chào,')
            ->line('Tài khoản của bạn đã được tạo thành công trên hệ thống.')
            ->line('Dưới đây là thông tin đăng nhập của bạn:')
            ->line('**Tên đăng nhập**: ' . $this->user->tentaikhoan)
            ->line('**Mật khẩu tạm thời**: ' . $this->temporaryPassword)
            ->action('Đăng nhập ngay', url('/login'))
            ->line('Vui lòng đăng nhập và đổi mật khẩu ngay lần đầu tiên để bảo mật tài khoản.')
            ->salutation('Trân trọng, Đội ngũ quản lý hệ thống');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
