<?php

namespace App\Models;

use App\Mail\ServiceInvoice;
use App\Traits\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Service extends Model
{
    use HasFactory, Payment;

    protected $appends = ['has_purchased'];

    public function getHasPurchasedAttribute(): bool {
        if (auth()->id()) {
            $this->users->where('user_id', auth()->id())->count() > 0;
        }
        return false;
    }

    public function users() {
        return $this->hasMany(ServiceUser::class);
    }

    public function purchase ($data) {
        $data['price'] = $this->price;
        $data['name'] = $this->name;

        $response = $this->charge($data);

        if ($response['success'] == true) {
            ServiceUser::create([
                'service_id' => $this->id,
                'user_id' => auth()->id()
            ]);

            return true;
        } else {
            return false;
        }
    }
}
