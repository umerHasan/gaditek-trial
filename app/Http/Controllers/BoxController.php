<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBoxRequest;
use App\Models\Box;
use App\Repositories\Contracts\BoxRepositoryInterface;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    private $boxRepository;

    public function __construct(BoxRepositoryInterface $boxRepository) {
        $this->boxRepository = $boxRepository;
    }

    public function create () {
        return view ('boxes.create');
    }

    public function store(CreateBoxRequest $request) {
        $data = $request->all();
        $data['created_by'] = auth()->id();

        $this->boxRepository->create($data);

        return redirect('/emails');
    }

    public function show($id) {
        $box = Box::find($id);

        if ($box->created_by != auth()->id()) {
            abort(404);
        }
        
        $emails = $this->boxRepository->boxEmailsOf($id);

        return view('emails.inbox', compact('emails'));
    }

    public function addEmail(Request $request) {
        $data = $request->all();

        $this->boxRepository->addEmailToBox($data);

        return redirect('/emails');
    }
}
