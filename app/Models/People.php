<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    public    $timestamps   = true;
    protected $table        = 'people';
    protected $fillable     = ['first_name', 'last_name', 'phone', 'email'];
    protected $hidden       = ['remember_token'];
}
