<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentFactory> */
    use HasFactory, softDeletes;
    protected $table = 'documents';
    protected $primaryKey = 'matailieu';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['matailieu', 'tentailieu', 'hinhanh', 'path', 'noidung', 'ngaydang', 'nguoidang' , 'trangthaiduyet', 'lydoan'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'nguoidang', 'tentaikhoan');
    }
}
