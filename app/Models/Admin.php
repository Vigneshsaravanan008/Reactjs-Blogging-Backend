<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guarded = [];
    protected $guard = 'admin';
    protected $hidden = ['password'];
}
