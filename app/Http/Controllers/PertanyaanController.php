<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pertanyaan;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data dari table pegawai
    	// $pertanyaan = DB::table('pertanyaan')->get();
        $pertanyaan = Pertanyaan::all();
    	// mengirim data pegawai ke view index
    	return view('Pertanyaan.show',['pertanyaan' => $pertanyaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Pertanyaan.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:pertanyaan|max:255',
            'isi' => 'required'
        ]);

        // DB::table('pertanyaan')->insert([
        //     'judul' => $request['judul'],
        //     'isi'   => $request['isi']
        // ]); 

        $pertanyaan = new Pertanyaan;
        $pertanyaan->judul  = $request['judul'];
        $pertanyaan->isi    = $request['isi'];
        $pertanyaan->save();

        return redirect('/pertanyaan')->with('success', 'Post Behasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pertanyaan = DB::table('pertanyaan')->where('id', $id)->first();
        $pertanyaan = Pertanyaan::find($id);
        return view('Pertanyaan.detail', compact('pertanyaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $pertanyaan = DB::table('pertanyaan')->where('id',$id)->first();

        $pertanyaan = Pertanyaan::find($id);

        return view('Pertanyaan.edit', compact('pertanyaan'));
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
        // $pertanyaan = DB::table('pertanyaan')
        //       ->where('id', $id)
        //       ->update([
        //           'judul' => $request['judul'],
        //           'isi'   => $request['isi']
        //       ]);
        $pertanyaan = Pertanyaan::where('id', $id)->update([
            'judul' => $request['judul'],
            'isi'   => $request['isi']
        ]);
        return redirect('/pertanyaan')->with('success', 'Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('pertanyaan')->where('id', $id)->delete();
        Pertanyaan::destroy($id);
        return redirect('/pertanyaan')->with('success', 'Post Berhasil di delete');
    }
}
