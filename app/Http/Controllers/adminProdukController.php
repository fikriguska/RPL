<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Produk;
use App\KomposisiProduk;
use App\Komposisi;


class adminProdukController extends Controller
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
        $produk = Produk::all();
        $komposisiProduk = KomposisiProduk::all();
        $komposisi = Komposisi::all();
        return view('admin.produk.produk')->with('produk', $produk)->with('komposisiProduk', $komposisiProduk)->with('komposisi', $komposisi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.produk.create');
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
        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->save();

        if($request->komposisi != null){
            $komposisi = explode(",", $request->komposisi);
            //  menambahkan komposisi baru jika tidak terdapat pada table
            foreach($komposisi as $p){
                    $kp = new KomposisiProduk;
                    $kp->id_produk = $produk->id;
                    $kp->id_komposisi = $p;
                    $kp->save();
                }
        }


        return back();
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

        $komposisiProduk = KomposisiProduk::select('id_komposisi')->where('id_produk', $id)->get();
        $produk = Produk::find($id);
        $komposisi = Komposisi::all();
        return view('admin.produk.edit')->with('komposisiProduk', $komposisiProduk)->with('produk', $produk)->with('komposisi', $komposisi);

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
            'nama' => ['string', 'nullable', 'max:255'],
        ]);


        $produk = Produk::find($id);
        if($request->nama != null)
            $produk->nama = $request->nama;

        if($request->komposisi != null){
            $komposisi = explode(",", $request->komposisi);
            //  menambahkan komposisi baru jika tidak terdapat pada table
            foreach($komposisi as $p){
                if(!KomposisiProduk::where('id_produk', $id)->where('id_komposisi', $p)->exists() && $komposisi != ""){
                    $kp = new KomposisiProduk;
                    $kp->id_produk = $id;
                    $kp->id_komposisi = $p;
                    $kp->save();
                }
            }
             // menghapus komposisi yang tidak terdapat pada request yang baru
            $qkomposisi = KomposisiProduk::where('id_produk', $id)->get();
            foreach($qkomposisi as $p){
                if(!in_array($p->id_komposisi, $komposisi)){
                    $p->delete();
                }
            }
        }
        // jika request komposisi tidak ada, hapus semua komposisi produk
        else{
            $qkomposisi = KomposisiProduk::where('id_produk', $id)->get();
            foreach($qkomposisi as $p){
                    $p->delete();
            }
        }

        
        $produk->save();

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
        $produk = Produk::find($id);
        $produk->delete();
        return back();
    }
}
