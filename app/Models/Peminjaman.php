<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = "peminjaman";
    protected $primaryKey = 'id';
    protected $fillable = ['buku_id', 'nama','peminjaman', 'pengembalian'];

    public function buku(){
        return $this->belongsTo(Buku::class,'buku_id','id');
    }
}
