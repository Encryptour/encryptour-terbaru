<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'mahasiswas';
    protected $fillable = [
        'nim', 'email_adress', 'nama_lengkap', 'nama_panggilan', 'agama', 'asal', 'ttl',
        'alamat_rumah', 'alamat_kos', 'hobi', 'quotes', 'tempat_makan_fav',
        'no_wa', 'user_ig', 'nama_wali', 'no_telp_wali', 'formal_picture', 'non_formal_picture', 'mdpl'
    ];
}
