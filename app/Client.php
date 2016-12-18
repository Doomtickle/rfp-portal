<?php

namespace App;

use App\ClientContact;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [

        'name',
        'industry'
    ];

    public function clientContacts()
    {
        return $this->hasMany(ClientContact::class);
    }

    public function addClientContact(ClientContact $contact)
    {
        return $this->clientContacts()->save($contact);
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function clientInfo($name)
    {
        $name = strtolower(str_replace('_', ' ', $name));

        return static::where(compact('name'))->with('clientContacts')->first();

    }
}
