<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    use HasFactory;
    
    protected $table = 'layout';

    protected $guarded = [];

    protected $fillable = [
        'nome_config',
        'value',
        'image',
    ];
           
}
