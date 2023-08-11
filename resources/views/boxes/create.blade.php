<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Email
        </h2>
    </x-slot>

    <div class="py-12 container">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="/boxes">
                @csrf
                <input class="form-control" name="name" placeholder="Box Name" />

                <button class="btn btn-primary float-end mt-1" type="submit">Send</button>
            </form>
        </div>
    </div>
</x-app-layout>
