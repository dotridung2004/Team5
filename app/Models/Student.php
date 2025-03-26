<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory, SoftDeletes;
    protected $table = 'students';
    protected $primaryKey = 'masinhvien';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['masinhvien', 'tensinhvien', 'hinhanh', 'khoa', 'lop', 'ngaysinh', 'gioitinh',  'quequan', 'tentaikhoan'];

    // Mối quan hệ n-1 với Account
    public function user()
    {
        return $this->belongsTo(User::class, 'tentaikhoan', 'tentaikhoan');
    }
}
