<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header"><h4>{{$service->name}}</h4></div>
                    <div class="card-body">
                        Price: {{$service->price}}
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header"><h4>Buy Service</h4></div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="/services/{{$service->id}}/purchase">
                            @csrf
                            <input type="text" name="card-no" class="form-control mt-1" placeholder="card number" required />
                            <input type="number" min="1" max="12" name="expiry-month" class="form-control mt-1" placeholder="Expiry Month" required />
                            <input type="number" min="2000" max="2050" name="expiry-year" class="form-control mt-1" placeholder="Expiry Year" required />
                            <input type="number" min="100" max="999" name="cvv" class="form-control mt-1" placeholder="CVV Code" required />
                            <button class="btn btn-primary mt-1 float-end" type="submit">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
