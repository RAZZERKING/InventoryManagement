<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partials.user.daftarUser', [
            'title' => 'List User',
            'user' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partials.user.formUser', [
            'title' => 'Add User',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ]);
        $req['password'] = bcrypt($request['password']);
        $req['id'] = fake()->unique()->numerify('User-#####');
        // return dd($req);
        try {
            User::create($req);
            return redirect('/user')->with('success', 'User Berhasil Ditambahkan');
        } catch (QueryException $ex) {
            return dd($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('partials.user.editUser', [
            'method' => 'edit',
            'title' => 'edit User',
            'user' => User::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $req = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);
        try {
            User::where('id', $id)->update($req);
            return redirect('/user')->with('success', 'Data User berhasil diubah');
        } catch (QueryException $ex) {
            return redirect('/user')->with('error', $ex->getMessage());
        }
    }

    public function editPassword($id)
    {
        return view('partials.user.editPassword', [
            'title' => 'Change Password',
            'id' => $id,
        ]);
    }

    public function updatePassword(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::destroy($id);
            // return dd($id);
            return redirect('/user')->with('success', 'User Berhasil Dihapus!!');
        } catch (QueryException $ex) {
            return redirect('/user')->with($ex->getMessage());
        }
    }
}
