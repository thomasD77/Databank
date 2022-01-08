<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\Photo;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AdminDocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $doc = new Doc();
        $doc->type_id = $request->type;
        $doc->description = $request->description;
        $doc->client_id = $request->client_id;
        $doc->save();

        if($files = $request->file('photos')){
            foreach ($files as $file) {
                $name = time(). $file->getClientOriginalName();
                $file->move('images/docs', $name);
                $path =  'images/docs/' . $name;
                Photo::create(['file'=>$name, 'doc_id'=>$doc->id]);
            }
        }

        Toastr::success('Doc Successfully Saved');

        return redirect('admin/clients');
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
        dd($request);
        $doc = Doc::findOrFail($id);
        $doc->type_id = $request->type;
        $doc->description = $request->description;
        $doc->client_id = $request->client_id;
        $doc->update();


        if($files = $request->photos){

            $oldDocs = Photo::where('doc_id', $doc->id)->get();
            foreach ($oldDocs as $doc){
                unlink('images/docs/' . $doc->file);
                $doc->delete();
            }

            foreach ($files as $file) {
                $name = time(). $file->getClientOriginalName();
                $file->move('images/docs', $name);
                $path =  'images/docs/' . $name;
                Photo::create(['file'=>$name, 'doc_id'=>$doc->id]);
            }
        }

        Toastr::success('Doc Successfully Updated');

        return redirect('admin/clients');
    }

    public function updateDoc(Request $request) {

        $doc = Doc::findOrFail($request->doc_id);
        $doc->type_id = $request->type;
        $doc->description = $request->description;
        $doc->client_id = $request->client_id;
        $doc->update();


        if($files = $request->photos){

            $oldDocs = Photo::where('doc_id', $doc->id)->get();
            foreach ($oldDocs as $doc){
                unlink('images/docs/' . $doc->file);
                $doc->delete();
            }

            foreach ($files as $file) {
                $name = time(). $file->getClientOriginalName();
                $file->move('images/docs', $name);
                $path =  'images/docs/' . $name;
                Photo::create(['file'=>$name, 'doc_id'=>$doc->id]);
            }
        }

        Toastr::success('Doc Successfully Updated');

        return redirect('admin/clients');
    }



    public function delete(Request $request) {

        $id = $request->doc_id;
        $docFile = Doc::findOrFail($id);

        foreach ($docFile->photos as $doc) {
            unlink('images/docs/' . $doc->file);
            $doc->delete();
        }

        $docFile->delete();

        Toastr::success('Doc Successfully Deleted');

        return redirect('admin/clients');
    }
}
