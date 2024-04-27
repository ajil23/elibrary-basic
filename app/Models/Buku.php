<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $primaryKey = 'id';
    protected $fillable = ['judul', 'kategori_id', 'image', 'pdf'];

    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id','id');
    }
}
