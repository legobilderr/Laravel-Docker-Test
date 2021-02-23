<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <h1>Users</h1>
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>phone</th>
            <th>User Type (USR or ADM)</th>
            <th>admin status</th>
            <th>ban status</th>

        </tr>
        @foreach($paginator as $user)
            @if ($user->id==Auth::user()->id)
                @continue
            @endif
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->Phone}}</td>
                <td>{{$user->UType}}</td>
                <td>
                    <form method='GET' enctype="multipart/form-data">
                        <a class="btn btn-warning " href="{{route('user-update-status',$user->id)}}">Update</a>

                    </form>
                </td>
                <td>
                    <form method='GET' enctype="multipart/form-data">
                        <a class="btn btn-danger " href="{{route('user-ban-status',$user->id)}}">Update</a>

                    </form>
                </td>

            </tr>
        @endforeach
    </table>


    @if($paginator->total()>$paginator->count())
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{$paginator->links()}}
                    </div>
                </div>
            </div>
        </div>

    @endif

</x-app-layout>
