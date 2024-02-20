<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stock_card';
    protected $primaryKey = 'sc_id';
    protected $fillable = ['item_id',	'iar_id',	'sc_stock_no',	'sc_reorder_point',	'sc_date',	'sc_reference',	'sc_receipt_qty', 'sc_issue_offc',	'sc_balance',	'sc_consume'];
    protected $guarded = ['deleted_at',	'created_at',	'updated_at'];
}
