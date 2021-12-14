<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table="tblberita";
    protected $fillable=['judul','isi','kategori_id','user_id'];

    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id','id');
    }
    
    
     public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}

