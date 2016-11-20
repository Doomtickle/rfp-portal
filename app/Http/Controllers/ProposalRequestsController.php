<?php

namespace App\Http\Controllers;

use App\Http\Requests\RFPRequest;
use App\ProposalRequest;
use App\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


/**
 * @property  user_id
 */
class ProposalRequestsController extends Controller
{
    protected $user_id;


    /**
     * Authorization middleware.
     *
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);

        parent::__construct();
    }


    /**
     *
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
     * @param RFPRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RFPRequest $request)
    {

        $pr = ProposalRequest::create($request->all());

        $pr->user_id = \Auth::user()->id;

        $pr->save();

//        return redirect()->back();
        flash()->success('Success!', 'The RFP has been created.');

        return Redirect::to('/home');
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

        $rfp = ProposalRequest::campaignInfo($clientName, $campaignName);


        return view('proposal_requests.show', compact('rfp'));
    }

    /**
     * @param $clientName
     * @param $campaignName
     * @param Request $request
     * @return string
     */
    public function addFile($clientName, $campaignName, Request $request)
    {
        $this->validate($request, [

            'proposal' => 'required|mimes:docx,pdf,xlsx'

        ]);


        $proposal = Proposal::fromForm($request->file('proposal'));

        return ProposalRequest::campaignInfo($clientName, $campaignName)->addProposal($proposal);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProposalRequest $proposalRequest
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(ProposalRequest $proposalRequest)
    {
        $pr = $proposalRequest;
        return view('proposal_requests.edit', compact('pr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RFPRequest|Request $request
     * @param ProposalRequest $proposalRequest
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(RFPRequest $request, ProposalRequest $proposalRequest)
    {
        $proposalRequest->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
