<?php

namespace App\Http\Controllers;

use App\ClientContact;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Client;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\ClientRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ClientRequest $request)
    {
        Client::create($request->all());

//        flash()->success('Success!', 'The client has been created');

        return Redirect::to('/clients/all');
    }
    public function addContact($name, Request $request)
    {

        $contact = ClientContact::create($request->all());

        Client::clientInfo($name)->addClientContact($contact);

        return redirect()->to('/client_list/'.strtolower(str_replace('_', ' ', $name)));


    }

    /**
     * Display the specified resource.
     *
     * @param $name
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($name)
    {
        $client = Client::clientInfo($name);

        return view('clients.show', compact('client'));
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

}
