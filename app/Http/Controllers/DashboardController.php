<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Repositories\Contracts\ServiceRepositoryInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    private $serviceRepository;
    
    public function __construct (ServiceRepositoryInterface $serviceRepository) {
        $this->serviceRepository = $serviceRepository;
    }

    public function index() : View {
        // $services = Service::with([
        //     'users' => function (Builder $query) {
        //         $query->where('user_id', auth()->id());
        //     }
        // ])->get(['id', 'name', 'price']);

        $services = $this->serviceRepository->getWithStatus();

        return view('dashboard', compact('services'));
    }
}
