<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Saran;
use App\RiwayatPenyakit;
use App\Penyakit;


    


class adminUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(!Auth::user()->admin)
            return back();
        $users = User::all();
        $riwayat = RiwayatPenyakit::all();
        $penyakit = Penyakit::all();

        return view('admin.user.admin')->with('users', $users)->with('riwayat', $riwayat)->with('penyakit', $penyakit);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
        $riwayat = RiwayatPenyakit::select('id_penyakit')->where('id_user', $id)->get();
        $penyakit = Penyakit::all();

        $user = User::find($id);
        return view('admin.user.edit')->with('user', $user)->with('riwayat', $riwayat)->with('penyakit', $penyakit);
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
        //
        $this->validate($request, [
            'name' => ['string', 'nullable', 'max:255'],
            'email' => ['string', 'nullable', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['string', 'nullable','max:16'],
            'admin' => ['nullable', 'integer'],
        ]);


        $user = User::find($id);
        if($request->name != null)
            $user->name = $request->name;
        if($request->email != null)
            $user->email = $request->email;
        if($request->password != null)
            $user->password = Hash::make($request->password);   
        if($request->admin != null)
            $user->admin = $request->admin;

            if($request->penyakit != null){
                $penyakit = explode(",", $request->penyakit);
                //  menambahkan penyakit baru jika tidak terdapat pada table
                foreach($penyakit as $p){
                    if(!RiwayatPenyakit::where('id_user', $id)->where('id_penyakit', $p)->exists() && $penyakit != ""){
                        $riwayat = new RiwayatPenyakit;
                        $riwayat->id_user = $id;
                        $riwayat->id_penyakit = $p;
                        $riwayat->save();
                    }
                }
                 // menghapus penyakit yang tidak terdapat pada request yang baru
                $qpenyakit = RiwayatPenyakit::where('id_user', $id)->get();
                foreach($qpenyakit as $p){
                    if(!in_array($p->id_penyakit, $penyakit)){
                        $p->delete();
                    }
                }
            }
            // jika request penyakit tidak ada, hapus semua riwayat user 
            else{
                $qpenyakit = RiwayatPenyakit::where('id_user', $id)->get();
                foreach($qpenyakit as $p){
                        $p->delete();
                }
            }
        
        $user->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $saran = Saran::where('id_user', $id);
        $saran->delete();
        $user = User::find($id);
        $user->delete();
        return back();
    }
}


