<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'items_tbl';
    protected $primaryKey = 'item_id';
    protected $fillable = ['item_name',	'item_desc',  'item_unit', 'item_quantity', 'is_stock', 'is_property', 'is_wmr', 'iar_id'];
    protected $guarded = ['deleted_at',	'created_at','updated_at'];
    
    public function iar()
    {
        return $this->belongsTo(Iar::class, 'iar_id', 'iar_id');
    }
}
