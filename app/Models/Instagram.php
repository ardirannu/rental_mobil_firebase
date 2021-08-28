<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    protected $table = 'instagram_section';

    protected $fillable = ['gambar', 'link_post_ig',]; 
}
