<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'created_by'];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function emails () {
        return $this->belongsToMany(Email::class, 'box_email', 'box_id', 'email_id');
    }
}
