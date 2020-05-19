<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;
use App\Produk;
use App\LaranganKonsumsi;
use App\KomposisiProduk;


class penyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $parsed_url = parse_url($request->fullUrl());
        $query = "";
        if(isset($parsed_url['query'])){
            $query = $parsed_url['query'];
        }
        

        if($request != [])
            $penyakit = Penyakit::where('nama','like','%'.$request->cari.'%')->get();
        else
            $penyakit = Penyakit::all();
        
        return view('penyakit.penyakit')->with('penyakit', $penyakit);
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
        $komposisi = [];
        $penyakit = Penyakit::find($id);
        $getKomposisi = LaranganKonsumsi::select('id_komposisi')->where('id_penyakit', $id)->get();

        foreach($getKomposisi as $gk){
            array_push($komposisi, $gk->id_komposisi);
        }

        $getProduk = KomposisiProduk::whereIn('id_komposisi', $komposisi)->get();
        $produk = [];

        foreach($getProduk as $gp){
            array_push($produk, $gp->id_produk);
        }

        $produk = Produk::whereIn('id', $produk)->get();
        return view('penyakit.tampil')->with('penyakit', $penyakit)->with('produk', $produk);
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
