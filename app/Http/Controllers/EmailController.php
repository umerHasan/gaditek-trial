<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmailRequest;
use App\Models\Email;
use App\Models\User;
use App\Repositories\Contracts\EmailRepositoryInterface;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    private $emailRepository;

    public function __construct(EmailRepositoryInterface $emailRepository) {
        $this->emailRepository = $emailRepository;    
    }

    public function index () {
        $boxes = auth()->user()->boxes;

        return view ('emails.index', compact('boxes'));
    }

    public function create () {
        $users = User::where('id', '!=', auth()->id())->get();

        return view ('emails.create', compact('users'));
    }

    public function store (CreateEmailRequest $request) {
        $data = $request->all();

        $data['sender_id'] = auth()->id();

        $this->emailRepository->create($data);

        return redirect('/emails');
    }

    public function show ($id) {
        $email = Email::with(['sender', 'receiver'])->find($id);
        $boxes = auth()->user()->boxes;

        if ($email->sender->id != auth()->id() && $email->receiver->id != auth()->id()) {
            abort(404);
        }

        return view ('emails.show', compact('email', 'boxes'));
    }

    public function inbox () {
        $emails = $this->emailRepository->inboxFor(auth()->id());

        return view ('emails.inbox', compact('emails'));
    }

    public function sent () {
        $emails = $this->emailRepository->sentItemsFor(auth()->id());
        return view ('emails.inbox', compact('emails'));
    }
}
