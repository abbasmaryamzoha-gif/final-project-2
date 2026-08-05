<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastPrompts extends Model
{
    protected $table = 'prompts1';
    protected $fillable = ['title', 'type', 'tone', 'temp', 'response'];
}
