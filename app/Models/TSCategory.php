<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSCategory extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $table = 'ts_category';

    protected $fillable = [
        'id',
        'name',
        'status',
        'create_by',
        'create_date'
    ];
}
