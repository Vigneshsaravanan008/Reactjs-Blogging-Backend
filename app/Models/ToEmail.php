<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToEmail extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function inbox()
    {
        return $this->belongsTo(Mail::class, 'mail_id', 'id');
    }

    public function fromuser()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }
}
