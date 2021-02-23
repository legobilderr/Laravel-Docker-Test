<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class='form-section '>
        <h2>Update</h2>
    </div>
    <form action="{{route('user-ban-status',$data->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="BanStatus">Enter new BanStatus (Yes or No)</label>
            <input type="text" name="BanStatus" placeholder="enter new BanStatus" value="{{$data->BanStatus}}" id="BanStatus" class="form-control">
        </div>
        <button tupe="submit" class="btn btn-success"> Update</button>
    </form>
</x-app-layout>
