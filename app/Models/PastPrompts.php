<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastPrompts extends Model
{
    protected $fillable = ['title', 'type', 'tone', 'response'];
}
