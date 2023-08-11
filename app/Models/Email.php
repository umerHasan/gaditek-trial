<?php

namespace App\Models;

use App\Mail\UserEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Email extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id', 'receiver_id', 'subject', 'content'];

    protected static function booted(): void {
        static::created(function (Email $email) {
            Mail::to($email->receiver->email)->queue(new UserEmail($email));
        });
    }

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }

    public function receiver() {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }
}
