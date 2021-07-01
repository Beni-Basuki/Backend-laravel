<?php
namespace App\Http\Controllers;

use App\Models\Keretaapi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KeretaapiController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table posts
        $keretaapis = Keretaapi::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Post',
            'data'    => $keretaapis  
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
        $keretaapi = Keretaapi::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $keretaapi 
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
        $keretaapi = Keretaapi::create([
            'nama'     => $request->nama,
            'asal'   => $request->asal,
            'tujuan'     => $request->tujuan,
            'keberangkatan'   => $request->keberangkatan
        ]);

        //success save to database
        if($keretaapi) {

            return response()->json([
                'success' => true,
                'message' => 'Post Created',
                'data'    => $keretaapi  
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
    public function update(Request $request, Keretaapi $keretaapi)
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
        $keretaapi = Keretaapi::findOrFail($keretaapi->id);

        if($keretaapi) {

            //update post
            $keretaapi->update([
                'nama'     => $request->nama,
            'asal'   => $request->asal,
            'tujuan'     => $request->tujuan,
            'keberangkatan'   => $request->keberangkatan
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Post Updated',
                'data'    => $keretaapi  
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
        $keretaapi = Keretaapi::findOrfail($id);

        if($keretaapi) {

            //delete post
            $keretaapi->delete();

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