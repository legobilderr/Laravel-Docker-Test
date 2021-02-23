<?php

namespace App\Http\Controllers\Users;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController

{

    public function dashboard(){
        if (Auth::user()->BanStatus == 'Yes') {
            return redirect('banPage');
        }
        return view('dashboard');
}
    public function home()
    {
        if (Auth::user()->BanStatus == 'Yes') {
            return redirect('banPage');
        }

        return view('user_home',);
    }

    public function updateU($id)
    {
        if (Auth::user()->BanStatus == 'Yes') {
            return redirect('banPage');
        }
        $user = new User;

        return view('update_user', ['data' => $user->find($id)]);
    }

    public function updateUserSubmit($id, Request $req)
    {
        $req->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);



        $user = User::find($id);
        $user->name = $req->input('name');
        $user->email = $req->input('email');
        $user->Phone = $req->input('Phone');
        $filename = time().'.'.$req->image->guessExtension();
        $req->image->move(public_path('img'), $filename);
        $user->PathToPhoto = $filename;

        $user->save();

        return redirect()->route('user-home-page', $id);
    }


    public function updateUserStatus($id)
    {
        if (Auth::user()->BanStatus == 'Yes') {
            return redirect('banPage');
        }
        $user = new User;

        return view('updateUserStatus', ['data' => $user->find($id)]);
    }

    public function updateUserStatusSubmit($id, Request $req)
    {
        if (Auth::user()->BanStatus == 'Yes') {
            return redirect('banPage');
        }

        $user = User::find($id);
        $user->UType = $req->input('UType');


        $user->save();

        return redirect()->route('all-users', $id);
    }


    public function updateUserBan($id)
    {
        $user = new User;

        return view('updateUserBan', ['data' => $user->find($id)]);
    }

    public function updateUserBanSub($id, Request $req)
    {
        $user = User::find($id);
        $user->BanStatus = $req->input('BanStatus');


        $user->save();

        return redirect()->route('all-users', $id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($status_user)
    {
        if (Auth::user()->BanStatus == 'Yes') {
            return redirect('banPage');
        }
        if ($status_user and Auth::user()->UType == 'ADM') {
            $paginator = User::paginate(5);
            return view('all_users', compact('paginator'));
        } else {
            return view('MistakeAссes');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
