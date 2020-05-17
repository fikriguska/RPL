<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Produk;
use App\LaranganKonsumsi;
use App\RiwayatPenyakit;
use App\KomposisiProduk;



class produkController extends Controller
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
    public function index(Request $request)
    {
        //
        $parsed_url = parse_url($request->fullUrl());
        $query = "";
        if(isset($parsed_url['query'])){
            $query = $parsed_url['query'];
        }
        

        if($request != [])
            $produk = Produk::where('nama','like','%'.$request->cari.'%')->get();
        else
            $produk = Produk::all();
        return view('produk.produk')->with('produk', $produk)->with('consumable', 0)->with('query', $query);

    }
    public function consumable(Request $request){

        $parsed_url = parse_url($request->fullUrl());
        $query = "";
        if(isset($parsed_url['query'])){
            $query = $parsed_url['query'];
        }

        $arr = [];
        $riwayatPenyakit = RiwayatPenyakit::select('id_penyakit')->where('id_user', Auth::user()->id)->get();
        foreach($riwayatPenyakit as $rp){
            array_push($arr, $rp->id_penyakit);
        }
        $laranganKonsumsi = LaranganKonsumsi::select('id_komposisi')->whereIn('id_penyakit', $arr)->get();
        $arr = [];
        foreach($laranganKonsumsi as $lk){
            array_push($arr, $lk->id_komposisi);
        }
        $komposisiProduk = KomposisiProduk::all();
        $larang = [];

        foreach($komposisiProduk as $p){
            if(in_array($p->id_komposisi, $arr) && !in_array($p->product, $larang)){
                array_push($larang, $p->id_produk);
            }
        }
        if($request != [])
            $produk = Produk::whereNotIn('id', $larang)->where('nama','like','%'.$request->cari.'%')->get();
        else
            $produk = Produk::whereNotIn('id', $larang)->get();
            
        return view('produk.produk')->with('produk', $produk)->with('riwayatPenyakit', $riwayatPenyakit)->with('laranganKonsumsi', $laranganKonsumsi)->with('consumable', 1)->with('query', $query);
    }

    public function notConsumable(Request $request){


        $parsed_url = parse_url($request->fullUrl());
        $query = "";
        if(isset($parsed_url['query'])){
            $query = $parsed_url['query'];
        }

        $arr = [];
        $riwayatPenyakit = RiwayatPenyakit::select('id_penyakit')->where('id_user', Auth::user()->id)->get();
        foreach($riwayatPenyakit as $rp){
            array_push($arr, $rp->id_penyakit);
        }
        $laranganKonsumsi = LaranganKonsumsi::select('id_komposisi')->whereIn('id_penyakit', $arr)->get();
        $arr = [];
        foreach($laranganKonsumsi as $lk){
            array_push($arr, $lk->id_komposisi);
        }
        
        $komposisiProduk = KomposisiProduk::all();
        $larang = [];

        foreach($komposisiProduk as $p){
            if(in_array($p->id_komposisi, $arr) && !in_array($p->product, $larang)){
                array_push($larang, $p->id_produk);
            }
        }
        if($request != [])
            $produk = Produk::whereIn('id', $larang)->where('nama','like','%'.$request->cari.'%')->get();
        else
            $produk = Produk::whereIn('id', $larang)->get();

        return view('produk.produk')->with('produk', $produk)->with('riwayatPenyakit', $riwayatPenyakit)->with('laranganKonsumsi', $laranganKonsumsi)->with('consumable', 0)->with('query', $query);
    }

    public function cari(Request $request){
        $produk = Produk::where('nama','like','%'.$request->cari.'%');
        return view('produk.produk')->with('produk', $produk);
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
        $produk = Produk::find($id);
        return view('produk.tampil')->with('produk', $produk);
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
