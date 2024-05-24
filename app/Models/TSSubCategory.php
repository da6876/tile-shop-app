<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSSubCategory extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'ts_subcategory';

    protected $fillable = [
        'id',
        'categoryid',
        'name',
        'status',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];
}
