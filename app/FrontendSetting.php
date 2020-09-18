<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontendSetting extends Model
{
    protected $fillable = ['logo',
     'site_title',
      'site_about',
       'copyright',
        'facebook',
         'twitter',
          'instagram',
           'gmail',
            'phone',
             'address' ];
}