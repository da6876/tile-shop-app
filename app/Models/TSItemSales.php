<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSItemSales extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'ts_sales';

    protected $fillable = [
        'id',
        'invoice_no',
        'stock_id',
        'item_id',
        'meas_unit',
        'qty_unit',
        'meas',
        'qty',
        'price',
        'vat',
        'tax',
        'discount',
        'others',
        'pay_status',
        'status',
        'create_by',
        'create_date',
        'update_by',
        'update_date',
    ];
}
