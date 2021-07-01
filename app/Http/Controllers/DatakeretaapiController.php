<?php

namespace App\Http\Controllers;
use App\Models\Keretaapi;
use Illuminate\Http\Request;

class DatakeretaapiController extends Controller
{
    public function index()
    {
         $keretaapis = Keretaapi::latest()->paginate(10);
        return view('keretaapi', compact('keretaapis'));
    }
    public function create()
{
    return view('createkeretaapi');
}

    public function store(Request $request)
{
    $this->validate($request, [
        'nama'     => 'required',
        'asal'     => 'required',
        'tujuan'     => 'required',
        'keberangkatan'   => 'required'
    ]);

   
   

    $keretaapis = Keretaapi::create([
        'nama'     => $request->nama,
        'asal'     => $request->asal,
        'tujuan'     => $request->tujuan,
        'keberangkatan'   => $request->keberangkatan
    ]);

    if($keretaapis){
        //redirect dengan pesan sukses
        return redirect()->route('keretaapi1')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('keretaapi1')->with(['error' => 'Data Gagal Disimpan!']);
    }
}

public function edit(Keretaapi $keretaapis)
{
    return view('editkeretaapi', compact('keretaapis'));
}


/**
* update
*
* @param  mixed $request
* @param  mixed $blog
* @return void
*/
public function update(Request $request, Keretaapi $keretaapis)
{
    $this->validate($request, [
        'nama'     => 'required',
        'asal'     => 'required',
        'tujuan'     => 'required',
        'keberangkatan'   => 'required'
    ]);

    //get data Blog by ID
    $keretaapis = Keretaapi::findOrFail($keretaapis->id);

    if($request->file('image') == "") {

        $keretaapis->update([
             'nama'     => $request->nama,
        'asal'     => $request->asal,
        'tujuan'     => $request->tujuan,
        'keberangkatan'   => $request->keberangkatan
        ]);

    } else {

        //hapus old image
       
        //upload new image
       
        $keretaapis->update([
              'nama'     => $request->nama,
        'asal'     => $request->asal,
        'tujuan'     => $request->tujuan,
        'keberangkatan'   => $request->keberangkatan
        ]);

    }

    if($keretaapis){
        //redirect dengan pesan sukses
        return redirect()->route('keretaapi1')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('keretaapi1')->with(['error' => 'Data Gagal Diupdate!']);
    }
}

    public function destroy($id)
{
  $keretaapis = Keretaapi::findOrFail($id);
  
  $keretaapis->delete();

  if($keretaapis){
     //redirect dengan pesan sukses
     return redirect()->route('keretaapi1')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('keretaapi1')->with(['error' => 'Data Gagal Dihapus!']);
  }
}

}