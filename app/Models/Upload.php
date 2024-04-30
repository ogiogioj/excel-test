<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Upload extends Model
{
    use HasFactory;
    protected $fillable = ['image_name','image_path','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
