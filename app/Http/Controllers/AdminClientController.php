<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Credentials;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Credential;
use App\Models\Loyal;
use App\Models\Source;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        //
        $client = new User();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->remarks = $request->remarks;

        $client->password = "";

        $client->save();

        DB::table('user_role')->insert([                                                                          //Set Client ID in user_role migration
            'user_id' => $client->id,
            'role_id' => '3',
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),]);


        \Brian2694\Toastr\Facades\Toastr::success('Client Successfully Saved');

        return redirect('/admin/clients');
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
        $client = User::findOrFail($id);

        $credentials = Credential::query()
            ->with(['client', 'subject'])
            ->where('client_id', $client->id)
            ->paginate(15);

        return view('admin.clients.show', compact('client', 'credentials'));
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
        $client = User::findOrFail($id);

        return view('admin.clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CLientRequest $request, $id)
    {
        //
        $client = User::findOrFail($id);
        $client->name = $request->name;
        $client->email = $request->email;
        $client->remarks = $request->remarks;

        $client->update();

        \Brian2694\Toastr\Facades\Toastr::success('Client Successfully Updated');

        return redirect('/admin/clients');
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
        $clients = User::where('archived', 1)
            ->latest()
            ->paginate(10);

        return view('admin.clients.archive', compact('clients'));
    }
}
