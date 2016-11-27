<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalRequest extends Model
{
    /**
     *
     */
    protected $table = 'proposalRequests';

    protected $fillable = [

        'budget',
        'staggered',
        'clientName',
        'campaignName',
        'flightDateEnd',
        'clientIndustry',
        'flightDateStart',
        'basicDescription'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Find the ProposalRequest with the given params
     * @param $clientName
     * @param $campaignName
     * @return mixed
     */
    public static function CampaignInfo($clientName, $campaignName)
    {
        $clientName = strtolower(str_replace('_', ' ', $clientName));
        $campaignName = strtolower(str_replace('_', ' ', $campaignName));

        return static::where(compact('clientName', 'campaignName'))->with('user')->first();

    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    /**
     * @param Proposal $proposal
     * @return Model
     */
    public function addProposal(Proposal $proposal)
    {
        return $this->proposals()->save($proposal);
    }

    /**
     * @param $budget
     * @return string
     */
    public function getBudgetAttribute($budget)
    {
        return '$' . number_format($budget, 2, '.', '');
    }
}
