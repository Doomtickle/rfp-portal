<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientContact;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class ClientsController extends Controller
{

    /**
     * ClientsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clients=Client::all();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\ClientRequest|Request $request
     * @return Response
     */
    public function store(Requests\ClientRequest $request)
    {
        Client::create($request->all());

//        flash()->success('Success!', 'The client has been created');

        return Redirect::to('/clients/all');
    }

    public function addContact($name, Request $request)
    {

        $this->validate($request, [
            'first_name'=>'required',
            'last_name' =>'required',
            'title'     =>'required',
            'email'     =>'required',
            'phone'     =>'required'

        ]);
        $contact=ClientContact::create($request->all());

        Client::clientInfo($name)->addClientContact($contact);

        return redirect()->to('/client_list/' . strtolower(str_replace('_', ' ', $name)));


    }

    /**
     * Display the specified resource.
     *
     * @param $name
     * @return Response
     * @internal param int $id
     */
    public function show($name)
    {
        $client=Client::clientInfo($name);

        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return Response
     * @internal param int $id
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Client $client
     * @return Response
     * @internal param int $id
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request, [

            'name'     =>  'required',
            'industry' =>  'required'

        ]);

        $client->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @internal param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('/clients/all');

    }

}
