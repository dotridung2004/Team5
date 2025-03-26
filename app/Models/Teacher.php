<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'teachers';
    protected $primaryKey = 'magiaovien';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['magiaovien', 'tengiaovien', 'hinhanh', 'khoa', 'ngaysinh', 'gioitinh', 'quequan', 'tentaikhoan'];

    // Mối quan hệ n-1 với User
    public function user()
    {
        return $this->belongsTo(User::class, 'tentaikhoan', 'tentaikhoan');
    }
}
