<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    /** @use HasFactory<\Database\Factories\FeedbackFactory> */
    use HasFactory, SoftDeletes;
    protected $table = 'feedback';
    protected $primaryKey = 'mathacmac';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['mathacmac', 'nguoigui', 'noidung', 'phanhoi', 'ngaythacmac', 'ngayphanhoi', 'nguoiphanhoi', 'trangthai', 'mabaiviet'];

    // Mối quan hệ n-1 với User (nguoiphanhoi)
    public function user()
    {
        return $this->belongsTo(User::class, 'nguoiphanhoi', 'tentaikhoan');
    }

    // Mối quan hệ n-1 với User (nguoigui)
    public function user1()
    {
        return $this->belongsTo(User::class, 'nguoigui', 'tentaikhoan');
    }

    // Mối quan hệ n-1 với News (mabaiviet)
    public function news()
    {
        return $this->belongsTo(News::class, 'mabaiviet', 'matintuc');
    }
}
