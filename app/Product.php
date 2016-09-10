<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{ //
    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'names' => 'json',
        'descriptions' => 'json',
        'site_keywords' => 'json',
        'site_descriptions' => 'json',
        'site_titles' => 'json'
    ];
}