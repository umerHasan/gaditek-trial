<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Emails
        </h2>
    </x-slot>

    <div class="py-12 container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header"><h4>New Email</h4></div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="/emails/create">Send New Email</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header"><h4>Inbox</h4></div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="/emails/inbox">Go to Inbox</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header"><h4>Sent Items</h4></div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="/emails/sent">Go to Sent Items</a>
                    </div>
                </div>
            </div>

            @foreach ($boxes as $box)
            <div class="col-4 mt-3">
                <div class="card">
                    <div class="card-header"><h4>{{$box->name}}</h4></div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="/boxes/{{$box->id}}">Go to {{$box->name}}</a>
                    </div>
                </div>
            </div>
            @endforeach

            <hr class="mt-3" />

            <div class="col-4 mt-3">
                <div class="card mt-4">
                    <div class="card-header"><h4>Create New Box</h4></div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="/boxes/create">Create New Box</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
