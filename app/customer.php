<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','address','shopename','photo','account_name','account_number','bank_name','bank_branch','city',
    ];
}
