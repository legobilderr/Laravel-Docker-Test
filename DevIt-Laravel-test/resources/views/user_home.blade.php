<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class='form-section '>
        <h2>Кабинет пользователя</h2>
        <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <img src="{{URL::asset('/img/'.Auth::user()->PathToPhoto)}}" alt="profile Pic" class=" mr-2 rounded" style=" width:120px; height:120px;>
                <strong class="d-block text-gray-dark">Name: {{Auth::user()->name}}</strong>
                <br>Email: {{Auth::user()->email}}
                <br>PhoneNumber: {{Auth::user()->Phone}}
            </p>
        </div>
        <h3 class='mt-4'> update bio </h3>
        <form method='GET' enctype="multipart/form-data">
            <a class="btn btn-warning " href="{{route('user-update-page',Auth::user()->id)}}">Update</a>

        </form>
    </div>
</x-app-layout>
