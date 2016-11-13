<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

/**
 * @property string path
 * @property \Illuminate\Database\Eloquent\Relations\BelongsTo user_id
 */
class Proposal extends Model
{

    protected $fillable = ['path', 'user_id'];

    protected $baseDir = 'rfps/proposals';


    public function proposal_request()
    {
        return $this->belongsTo(ProposalRequest::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    /**
     * @param UploadedFile $file
     * @return static
     * @internal param Request $request
     */
    public static function fromForm(UploadedFile $file)
    {
        $proposal = new static;


        $name = time() . $file->getClientOriginalName();

        $proposal->path = $proposal->baseDir . '/' . $name;
        $file->move($proposal->baseDir, $name);

        return $proposal;
    }
}
