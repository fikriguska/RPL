<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Penyakit;
use App\RiwayatPenyakit;


use DB;

class profileController extends Controller
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
        $penyakit = Penyakit::all();
        $riwayat = RiwayatPenyakit::select('id_penyakit')->where('id_user', Auth::user()->id)->get();

        return view('profile.profile')->with('riwayat', $riwayat)->with('penyakit', $penyakit);
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
    public function edit()
    {
        //
        $user = Auth::user();
        $riwayat = RiwayatPenyakit::select('id_penyakit')->where('id_user', $user->id)->get();
        $penyakit = Penyakit::all();
        // foreach($riwayat as $r)
        //     echo var_dump($penyakit[$r->id_penyakit-1]->nama);
        // return;
        // $user = 
        return view('/profile/edit')->with('user', $user)->with('riwayat', $riwayat)->with('penyakit', $penyakit);
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
            'password' => ['string', 'nullable'],
            'penyakit' => ['nullable']
        ]);


        $user = User::find($id);
        if($request->gambar!=null){
                $file = $request->file('gambar');
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'gambar';
                $file->move($tujuan_upload,$nama_file);
                $produk->gambar = $nama_file;
        }
            
        if($request->name != null)
            $user->name = $request->name;
        if($request->email != null)
            $user->email = $request->email;
        if($request->password != null)
            $user->password = Hash::make($request->password);  
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
    }
}
