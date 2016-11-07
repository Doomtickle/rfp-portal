<?php

namespace App\Http\Controllers;

use App\ProposalRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProposalRequestsController extends Controller
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
       return view('proposal_requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\RFPRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\RFPRequest $request)
    {
        ProposalRequest::create($request->all());

        flash()->success('Success!', 'The RFP has been created.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param $clientName
     * @param $campaignName
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($clientName, $campaignName)
    {
        $rfp = ProposalRequest::campaignInfo($clientName, $campaignName)->first();

        return view('proposal_requests.show', compact('rfp'));
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
