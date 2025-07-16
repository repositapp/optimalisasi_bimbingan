<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['judul', 'pembimbing'];

    public function judul()
    {
        return $this->belongsTo(Judul::class);
    }

    public function pembimbing()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing_id');
    }
}
