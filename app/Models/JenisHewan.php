<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisHewan extends Model
{
    use HasFactory;
    protected $table = 'jenis_hewans';
    protected $guarded = ['id'];
    
}
