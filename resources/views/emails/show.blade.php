<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$email->subject}}
        </h2>
    </x-slot>

    <div class="py-12 container">
        <div class="row">
            <div class="card">
                <div class="card-header">Move to</div>
                <div class="card-body">
                    <form action="/boxes/add-email" method="post">
                        @csrf
                        <select name="box_id">
                            @foreach ($boxes as $box)
                            <option value="{{$box->id}}">
                                {{$box->name}}
                            </option>
                            @endforeach
                        </select>

                        <input name="email_id" type="hidden" value="{{$email->id}}" />

                        <button type="submit" class="btn btn-primary">Move</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mt-3 p-5">
                    {{$email->content}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
