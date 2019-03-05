<?php

namespace Djunehor;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'continent'];
}
