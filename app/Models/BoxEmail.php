<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxEmail extends Model
{
    use HasFactory;

    protected $table = 'box_email';

    protected $fillable = ['box_id', 'email_id'];
}
