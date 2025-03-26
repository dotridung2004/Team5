<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchPaper extends Model
{
    /** @use HasFactory<\Database\Factories\ResearchPaperFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'research_papers';
    protected $primaryKey = 'mabaiviet';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['mabaiviet', 'tenbaiviet', 'mota', 'noidung', 'path', 'hinhanh', 'ngaydang', 'nguoidang'];

    // Mối quan hệ n-1 với Account (nguoidang)
    public function user()
    {
        return $this->belongsTo(User::class, 'nguoidang', 'tentaikhoan');
    }
}
