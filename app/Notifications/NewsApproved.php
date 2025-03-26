<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewsApproved extends Notification
{
    use Queueable;

    protected $news;

    public function __construct($news)
    {
        $this->news = $news;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Bài viết của bạn đã được duyệt')
            ->greeting('Xin chào ' . $this->news->nguoidang . ',')
            ->line('Bài viết của bạn đã được quản trị viên xem xét và **duyệt thành công**.')
            ->line('Bài viết hiện đang công khai trên website.')
            ->action('Xem bài viết', url('/news/' . $this->news->matintuc))
            ->salutation('Trân trọng, Đội ngũ quản lý');
    }
}
