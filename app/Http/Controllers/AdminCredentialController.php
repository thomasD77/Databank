<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use App\Models\Doc;
use App\Models\DocType;
use App\Models\Photo;
use App\Models\Subject;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminCredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $credentials = Credential::paginate(15);
        return view('admin.credentials.index', compact('credentials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = ['client'];
        $clients = User::whereHas('roles', function($q) use($role) {
            $q->whereIn('name', $role);})
            ->where('archived', 0)
            ->pluck('name', 'id')
            ->all();

        $subjects = Subject::where('archived', 0)
            ->pluck('name', 'id');


        return view('admin.credentials.create', compact('clients', 'subjects'));
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
        $this->validate($request, [
            'client_id'=>'required',
            'subject_id'=>'required',
        ]);

        $credential = new Credential();

        $credential->user_id = Auth::user()->id;
        $credential->client_id = $request->client_id;
        $credential->subject_id = $request->subject_id;

        $credential->host = $request->host;
        $credential->login = $request->login;
        $credential->password = $request->password;
        $credential->remarks = $request->remarks;

        $credential->save();

        \Brian2694\Toastr\Facades\Toastr::success('credential Successfully Saved');

        return redirect('/admin/credentials');
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
        $credential = Credential::findOrFail($id);

        return view('admin.credentials.show', compact('credential'));
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
        $credential = Credential::findOrFail($id);

        $role = ['client'];
        $clients = User::whereHas('roles', function($q) use($role) {
            $q->whereIn('name', $role);})
            ->where('archived', 0)
            ->pluck('name', 'id')
            ->all();

        $subjects = Subject::where('archived', 0)
            ->pluck('name', 'id');


        return view('admin.credentials.edit', compact('clients', 'subjects', 'credential'));
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
            'client_id'=>'required',
            'subject_id'=>'required',
        ]);

        $credential = Credential::findOrFail($id);

        $credential->user_id = Auth::user()->id;
        $credential->client_id = $request->client_id;
        $credential->subject_id = $request->subject_id;

        $credential->host = $request->host;
        $credential->login = $request->login;
        $credential->password = $request->password;
        $credential->remarks = $request->remarks;

        $credential->update();

        \Brian2694\Toastr\Facades\Toastr::success('credential Successfully Updated');

        return redirect('/admin/credentials');
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
    }

    public function archive()
    {
        $credentials = Credential::where('archived', 1)
            ->latest()
            ->paginate(20);
        return view('admin.credentials.archive', compact('credentials'));
    }

    public function createCredentialDoc(Request $request)
    {
        $doc = new Doc();
        $doc->docType_id = $request->type;
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

        Toastr::success('Post Successfully Saved');

        return redirect('admin/clients');

    }


}
