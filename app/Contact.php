<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = ["nom", "prenom", "email", "source", "company", "mobile_phone", "work_phone", "street", "zipcode", "city", "other", "notes"];

    public $timestamps = true;
}
