<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 container">
        <div class="row">
            @foreach ($services as $service)
            <div class="col-4">
                <div class="card">
                    <div class="card-header"><h4>{{$service->name}}</h4></div>
                    <div class="card-body">
                        @if ($service->users->count() > 0)
                        <span class="text-light bg-success p-2">purchased</span>
                        @else
                        <a href="/services/{{$service->id}}">Purchase</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
