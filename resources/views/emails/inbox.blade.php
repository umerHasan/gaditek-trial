<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Inbox
        </h2>
    </x-slot>

    <div class="py-12 container">
        <div class="row">
            @foreach ($emails as $e)
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$e->subject}}</h4>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="/emails/{{$e->id}}">View</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
