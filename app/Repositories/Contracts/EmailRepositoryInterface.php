<?php

namespace App\Repositories\Contracts;

use App\Models\Email;
use Illuminate\Database\Eloquent\Collection;

interface EmailRepositoryInterface {
    public function create(array $data): Email;
    public function inboxFor($id): Collection;
    public function sentItemsFor($id): Collection;
    public function find($id): Email;
}