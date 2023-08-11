<?php

namespace App\Repositories\Contracts;

use App\Models\Box;
use Illuminate\Database\Eloquent\Collection;

interface BoxRepositoryInterface {
    public function create(array $data): Box;
    public function boxEmailsOf($id): Collection;
    public function addEmailToBox(array $data): void;
}