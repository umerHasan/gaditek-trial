<?php

namespace App\Repositories;

use App\Models\Box;
use App\Models\BoxEmail;
use App\Repositories\Contracts\BoxRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BoxRepository implements BoxRepositoryInterface {
    public function create(array $data): Box {
        return Box::create($data);
    }

    public function boxEmailsOf($id): Collection {
        return Box::find($id)->emails;
    }

    public function addEmailToBox(array $data): void {
        BoxEmail::create($data);
    }
}