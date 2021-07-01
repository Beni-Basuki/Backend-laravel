<?php
namespace App\Http\Controllers;

use App\Models\Pesawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesawatController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table posts
        $pesawats = Pesawat::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $pesawats  
        ], 200);

    }
    
     /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find post by ID
        $pesawat = Pesawat::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $pesawat 
        ], 200);

    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'asal' => 'required',
            'tujuan'   => 'required',
            'keberangkatan' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $pesawat = Pesawat::create([
            'nama'     => $request->nama,
            'asal'   => $request->asal,
            'tujuan'     => $request->tujuan,
            'keberangkatan'   => $request->keberangkatan
        ]);

        //success save to database
        if($pesawat) {

            return response()->json([
                'success' => true,
                'message' => 'Post Created',
                'data'    => $pesawat  
            ], 201);

        } 

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Post Failed to Save',
        ], 409);

    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Pesawat $pesawat)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'asal' => 'required',
            'tujuan'   => 'required',
            'keberangkatan' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find post by ID
        $pesawat = Pesawat::findOrFail($pesawat->id);

        if($pesawat) {

            //update post
            $pesawat->update([
                'nama'     => $request->nama,
            'asal'   => $request->asal,
            'tujuan'     => $request->tujuan,
            'keberangkatan'   => $request->keberangkatan
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Post Updated',
                'data'    => $pesawat  
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Post Not Found',
        ], 404);

    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //find post by ID
        $pesawat = Pesawat::findOrfail($id);

        if($pesawat) {

            //delete post
            $pesawat->delete();

            return response()->json([
                'success' => true,
                'message' => 'Post Deleted',
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Post Not Found',
        ], 404);
    }
}