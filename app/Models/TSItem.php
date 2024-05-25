<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSItem extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'ts_item';

    protected $fillable = [
        'id',
        'type_id',
        'category_id',
        'subcategory_id',
        'size_id',
        'name',
        'details',
        'item_code',
        'grade',
        'status',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];
}
