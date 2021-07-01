<?php

namespace App\Http\Controllers;
use App\Models\Pesawat;
use Illuminate\Http\Request;

class DatapesawatController extends Controller
{
    public function index()
    {
         $pesawats = Pesawat::latest()->paginate(10);
        return view('pesawat', compact('pesawats'));
    }
    public function create()
{
    return view('create');
}

    public function store(Request $request)
{
    $this->validate($request, [
        'nama'     => 'required',
        'asal'     => 'required',
        'tujuan'     => 'required',
        'keberangkatan'   => 'required'
    ]);

    //upload image
   

    $pesawats = Pesawat::create([
        'nama'     => $request->nama,
        'asal'     => $request->asal,
        'tujuan'     => $request->tujuan,
        'keberangkatan'   => $request->keberangkatan
    ]);

    if($pesawats){
        //redirect dengan pesan sukses
        return redirect()->route('pesawat1')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('pesawat1')->with(['error' => 'Data Gagal Disimpan!']);
    }
}

public function edit(Pesawat $pesawats)
{
    return view('editpesawat', compact('pesawats'));
}


/**
* update
*
* @param  mixed $request
* @param  mixed $blog
* @return void
*/
public function update(Request $request, Pesawat $pesawats)
{
    $this->validate($request, [
        'nama'     => 'required',
        'asal'     => 'required',
        'tujuan'     => 'required',
        'keberangkatan'   => 'required'
    ]);

    //get data Blog by ID
    $pesawats = Pesawat::findOrFail($pesawats->id);

    if($request->file('image') == "") {

        $pesawats->update([
             'nama'     => $request->nama,
        'asal'     => $request->asal,
        'tujuan'     => $request->tujuan,
        'keberangkatan'   => $request->keberangkatan
        ]);

    } else {

        //hapus old image
       
        //upload new image
       
        $pesawats->update([
              'nama'     => $request->nama,
        'asal'     => $request->asal,
        'tujuan'     => $request->tujuan,
        'keberangkatan'   => $request->keberangkatan
        ]);

    }

    if($pesawats){
        //redirect dengan pesan sukses
        return redirect()->route('pesawat1')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('pesawat1')->with(['error' => 'Data Gagal Diupdate!']);
    }
}

    public function destroy($id)
{
  $pesawats = Pesawat::findOrFail($id);
  
  $pesawats->delete();

  if($pesawats){
     //redirect dengan pesan sukses
     return redirect()->route('pesawat1')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('pesawat1')->with(['error' => 'Data Gagal Dihapus!']);
  }
}

}