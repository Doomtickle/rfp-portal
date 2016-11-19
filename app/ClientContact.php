<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientContact extends Model
{
    protected $fillable = [

        'first_name',
        'last_name',
        'title',
        'email',
        'phone'

    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
   }
}
