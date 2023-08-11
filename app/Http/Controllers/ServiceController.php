<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicePurchaseRequest;
use App\Repositories\Contracts\ServiceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    private $serviceRepository;

    public function __construct (ServiceRepositoryInterface $serviceRepository) {
        $this->serviceRepository = $serviceRepository;
    }

    public function show ($id): View {
        $service = $this->serviceRepository->find($id);

        return view('services.show', compact('service'));
    }

    public function purchase ($id, ServicePurchaseRequest $request) {
        $service = $this->serviceRepository->find($id);

        $data = $request->all();
        $service->purchase($data);

        return redirect('/dashboard');
    }
}
