<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = 'admins';
    protected $primaryKey = 'maquantri';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['maquantri', 'tenquantri', 'hinhanh', 'ngaysinh', 'gioitinh', 'quequan', 'tentaikhoan'];

    // Mối quan hệ n-1 với Account
    public function user()
    {
        return $this->belongsTo(User::class, 'tentaikhoan', 'tentaikhoan');
    }
}
