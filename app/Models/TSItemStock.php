<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSItemStock extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'ts_stock';

    protected $fillable = [
        'id',
        'stock_code',
        'item_id',
        'meas_unit',
        'qty_unit',
        'meas',
        'qty',
        'sell_price',
        'buy_price',
        'status',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];
}
