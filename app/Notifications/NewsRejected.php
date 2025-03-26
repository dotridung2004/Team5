<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewsRejected extends Notification
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
            ->subject('Bài viết của bạn bị từ chối')
            ->greeting('Xin chào ' . $this->news->nguoidang . ',')
            ->line('Bài viết của bạn đã được quản trị viên xem xét và **bị từ chối**.')
            ->line('Lý do từ chối: ' . $this->news->lydotuchoi)
            ->line('Vui lòng chỉnh sửa và gửi lại để được duyệt.')
            ->action('Chỉnh sửa bài viết', url('/news/edit/' . $this->news->matintuc))
            ->salutation('Trân trọng, Đội ngũ quản lý');
    }
}
