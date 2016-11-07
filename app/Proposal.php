<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{

    protected $fillable = ['path'];
    public function proposal_request()
    {
        return $this->belongsTo('App\ProposalRequest');
    }

}
