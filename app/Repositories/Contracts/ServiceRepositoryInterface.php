<?php

namespace App\Repositories\Contracts;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

interface ServiceRepositoryInterface {
    public function get(): Collection;
    public function getWithStatus(): Collection;
    public function find($id): Service;
}