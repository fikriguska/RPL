<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Komposisi;
use App\KomposisiProduk;
use App\LaranganKonsumsi;

class adminKomposisiController extends Controller
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
        $komposisi = Komposisi::all();
        return view('admin.komposisi.komposisi')->with('komposisi', $komposisi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.komposisi.create');

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
        $komposisi = new Komposisi;
        $komposisi->nama = $request->nama;

        $komposisi->save();
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
        $komposisi = Komposisi::find($id);
        return view('admin.komposisi.edit')->with('komposisi', $komposisi);
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


        $komposisi = Komposisi::find($id);
        if($request->nama != null)
            $komposisi->nama = $request->nama;

        
        $komposisi->save();

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
        $komposisiProduk = KomposisiProduk::where('id_komposisi', $id);
        $komposisiProduk->delete();
    

        $laranganKonsumsi = LaranganKonsumsi::where('id_komposisi', $id);
        $laranganKonsumsi->delete();

        $komposisi = Komposisi::find($id);
        $komposisi->delete();
        return back();
    }
}
