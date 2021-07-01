<?php

namespace App\Http\Controllers;
use App\Models\Mobil;
use Illuminate\Http\Request;

class DatamobilController extends Controller
{
    public function index()
    {
         $mobils = Mobil::latest()->paginate(10);
        return view('mobil', compact('mobils'));
    }
    public function create()
{
    return view('createmobil');
}

    public function store(Request $request)
{
    $this->validate($request, [
        'nama'     => 'required',
        'asal'     => 'required',
        'tujuan'     => 'required',
        'keberangkatan'   => 'required'
    ]);

   
   

    $mobils = Mobil::create([
        'nama'     => $request->nama,
        'asal'     => $request->asal,
        'tujuan'     => $request->tujuan,
        'keberangkatan'   => $request->keberangkatan
    ]);

    if($mobils){
        //redirect dengan pesan sukses
        return redirect()->route('mobil1')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('mobil1')->with(['error' => 'Data Gagal Disimpan!']);
    }
}

public function edit(Mobil $mobils)
{
    return view('editmobil', compact('mobils'));
}


/**
* update
*
* @param  mixed $request
* @param  mixed $blog
* @return void
*/
public function update(Request $request, Mobil $mobils)
{
    $this->validate($request, [
        'nama'     => 'required',
        'asal'     => 'required',
        'tujuan'     => 'required',
        'keberangkatan'   => 'required'
    ]);

    //get data Blog by ID
    $mobils = Mobil::findOrFail($mobils->id);

    if($request->file('image') == "") {

        $mobils->update([
             'nama'     => $request->nama,
        'asal'     => $request->asal,
        'tujuan'     => $request->tujuan,
        'keberangkatan'   => $request->keberangkatan
        ]);

    } else {

        //hapus old image
       
        //upload new image
       
        $mobils->update([
              'nama'     => $request->nama,
        'asal'     => $request->asal,
        'tujuan'     => $request->tujuan,
        'keberangkatan'   => $request->keberangkatan
        ]);

    }

    if($mobils){
        //redirect dengan pesan sukses
        return redirect()->route('mobil1')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('mobil1')->with(['error' => 'Data Gagal Diupdate!']);
    }
}

    public function destroy($id)
{
  $mobils = Mobil::findOrFail($id);
  
  $mobils->delete();

  if($mobils){
     //redirect dengan pesan sukses
     return redirect()->route('mobil1')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('mobil1')->with(['error' => 'Data Gagal Dihapus!']);
  }
}

}