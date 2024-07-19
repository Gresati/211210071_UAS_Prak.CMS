<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = "home";
    protected $fillable = ['hero','deskripsi','foto1','foto2','foto3'];
    public $timestamps = false;

}
