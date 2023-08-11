<?php

namespace App\Models;

use App\Mail\ServiceInvoice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class ServiceUser extends Model
{
    use HasFactory;

    protected $table = 'service_user';
    
    protected $fillable = ['service_id', 'user_id', 'price'];

    protected static function booted(): void {
        static::created(function (ServiceUser $model) {
            $user = User::find($model->user_id);
            
            Mail::to($user->email)->queue(new ServiceInvoice($model->user_id, $model->service_id));
        });
    }
}
