<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Penyakit;
use App\LaranganKonsumsi;
use App\RiwayatPenyakit;



class adminPenyakitController extends Controller
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
        $penyakit = Penyakit::all();
        return view('admin.penyakit.penyakit')->with('penyakit', $penyakit);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.penyakit.create');

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
        $penyakit = new Penyakit;
        $penyakit->nama = $request->nama;

        $penyakit->save();
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
        $penyakit = Penyakit::find($id);
        return view('admin.penyakit.edit')->with('penyakit', $penyakit);
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

        
        $penyakit = Penyakit::find($id);
        if($request->nama != null)
            $penyakit->nama = $request->nama;

        
        $penyakit->save();

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
        $laranganKonsumsi = LaranganKonsumsi::where('id_penyakit', $id);
        $laranganKonsumsi->delete();

        $riwayatPenyakit = RiwayatPenyakit::where('id_penyakit', $id);
        $riwayatPenyakit->delete();

        $penyakit = Penyakit::find($id);
        $penyakit->delete();
        return back();
    }
}
