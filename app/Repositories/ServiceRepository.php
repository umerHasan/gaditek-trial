<?php

namespace App\Repositories;

use App\Models\Service;
use App\Repositories\Contracts\ServiceRepositoryInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ServiceRepository implements ServiceRepositoryInterface {
    public function get(): Collection {
        return Service::get();
    }

    public function getWithStatus(): Collection
    {
        return Service::with([
            'users' => function (Builder $query) {
                $query->where('user_id', auth()->id());
            }
        ])->get(['id', 'name', 'price']);
    }

    public function find($id): Service {
        return Service::find($id);
    }
}