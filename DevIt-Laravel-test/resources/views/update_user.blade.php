<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class='form-section '>
        <h2>Update</h2>
        @if($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>

            </div>
        @endif
    </div>
    <form action="{{route('user-update-submit',$data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Enter new name</label>
            <input type="text" name="name" placeholder="enter new name" value="{{Auth::user()->name}}" id="name"
                   class="form-control">
        </div>

        <div class="form-group">
            <label for="name">Enter new email</label>
            <input type="text" name="email" placeholder="enter new email" value="{{Auth::user()->email}}" id="email"
                   class="form-control">
        </div>

        <div class="form-group">
            <label for="name">Enter new Phone</label>
            <input type="text" name="Phone" placeholder="enter new Phone" value="{{Auth::user()->Phone}}" id="Phone"
                   class="form-control">
        </div>


        <div class="form-group">
            <label for="image">Enter new Photo</label>
            <input type="file" name="image"  class="form-control" id="image" >
        </div>

        <button tupe="submit" class="btn btn-success"> Update</button>
    </form>
</x-app-layout>

