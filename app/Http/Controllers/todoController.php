<?php

namespace App\Http\Controllers;
use App\ModelTodo;
use Illuminate\Http\Request;
// use App\Http\Controllers\Request;
// use App\Http\Controllers\Controller;

class todoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function index() {
        $data = ModelTodo::all();
        return response($data);
    }

    public function show($id) {
        $data = ModelTodo::where('id',$id)->get();
        return response($data);
    }

    public function store(Request $request) {
        $data = new ModelTodo();
        $data->aktivitas = $request->input('aktivitas');
        $data->deskripsi = $request->input('deskripsi');
        $data->save();

        return response('Berhasil Tambah Data');
    }

    public function update(Request $request, $id) {
        $data = ModelTodo::where('id',$id)->first();
        $data->aktivitas = $request->input('aktivitas');
        $data->deskripsi = $request->input('deskripsi');
        $data->save();

        return response('Berhasil Mengubah Data');
    }

    public function destroy($id) {
        $data = ModelTodo::where('id',$id)->first();
        $data->delete();

        return response('Berhasil Menghapus Data');
    }

    //
}
