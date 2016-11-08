<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * @property string path
 */
class Proposal extends Model
{

    protected $fillable = ['path'];

    protected $baseDir = 'rfps/proposals';

    public function proposal_request()
    {
        return $this->belongsTo('App\ProposalRequest');
    }

    /**
     * @param UploadedFile $file
     * @return static
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
