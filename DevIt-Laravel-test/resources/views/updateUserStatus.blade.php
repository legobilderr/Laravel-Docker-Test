<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class='form-section '>
        <h2>Update</h2>
    </div>
    <form action="{{route('user-update-status',$data->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="UType">Enter new UType (ADM or USR)</label>
            <input type="text" name="UType" placeholder="enter new UType" value="{{$data->UType}}" id="UType" class="form-control">
        </div>
        <button tupe="submit" class="btn btn-success"> Update</button>
    </form>
</x-app-layout>
