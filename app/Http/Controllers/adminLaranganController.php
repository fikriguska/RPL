<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\LaranganKonsumsi;
use App\Komposisi;
use App\Penyakit;



class adminLaranganController extends Controller
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
        $larangan = LaranganKonsumsi::all();
        return view('admin.larangan.larangan')->with('larangan', $larangan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $komposisi = Komposisi::all();
        $penyakit = Penyakit::all();
        return view('admin.larangan.create')->with('komposisi', $komposisi)->with('penyakit', $penyakit);

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

        $larangan = new LaranganKonsumsi;
        $larangan->id_penyakit = $request->penyakit;
        $larangan->id_komposisi = $request->komposisi;


        $larangan->save();
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
        $larangan = LaranganKonsumsi::find($id);
        $komposisi = Komposisi::all();
        $penyakit = Penyakit::all();
        return view('admin.larangan.edit')->with('larangan', $larangan)->with('komposisi', $komposisi)->with('penyakit', $penyakit);
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


        $larangan = LaranganKonsumsi::find($id);
        if($request->nama != null)
            $larangan->nama = $request->nama;

        
        $larangan->save();

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
        $larangan = LaranganKonsumsi::find($id);
        $larangan->delete();
        return back();
    }
}
