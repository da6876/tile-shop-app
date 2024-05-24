<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSItemSize extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'ts_itemsize';

    protected $fillable = [
        'id',
        'name',
        'status',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];
}
