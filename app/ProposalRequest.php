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

        'clientName',
        'clientIndustry',
        'campaignName',
        'basicDescription',
        'flightDateStart',
        'flightDateEnd',
        'staggered',
        'budget'

    ];

    public function scopeCampaignInfo($query, $clientName, $campaignName)
    {
        $clientName = strtolower(str_replace('_', ' ', $clientName));
        $campaignName = strtolower(str_replace('_', ' ', $campaignName));

        return $query->where(compact('clientName', 'campaignName'));

    }

    public function proposals()
    {
        return $this->hasMany('App\Proposal');
    }

    /**
     * @param $budget
     * @return string
     */
    public function getBudgetAttribute($budget)
    {
        return '$' . number_format($budget);
    }
}
