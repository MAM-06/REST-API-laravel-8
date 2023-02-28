<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mahasiswa extends Model
{
    use HasFactory;
    use SoftDeletes;  

    protected $table ='mahasiswa';  //nama tabel
    protected $fillable = [ //field yang bisa diisi
        'name',  //field yang ada di tabel mahasiswa
        'alamat' //field yang ada di tabel mahasiswa
    ];

    protected $hidden = [];  //hidden field
}