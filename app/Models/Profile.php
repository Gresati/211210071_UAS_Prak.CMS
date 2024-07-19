<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = "profile";
    protected $fillable = ['image','name','ttl','soft_skill','hard_skill'];
    public $timestamps = false;

}
