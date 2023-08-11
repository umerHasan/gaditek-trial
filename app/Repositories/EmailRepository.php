<?php

namespace App\Repositories;

use App\Models\Email;
use App\Repositories\Contracts\EmailRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EmailRepository implements EmailRepositoryInterface {
    public function create(array $data): Email {
        return Email::create($data);
    }

    public function inboxFor($id): Collection {
        return Email::with(['sender', 'receiver'])->where('receiver_id', $id)->get();
    }

    public function sentItemsFor($id): Collection {
        return Email::with(['sender', 'receiver'])->where('sender_id', $id)->get();
    }

    public function find($id): Email {
        return Email::with(['sender', 'receiver'])->find($id);
    }
}