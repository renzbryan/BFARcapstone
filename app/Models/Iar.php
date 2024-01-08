<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Iar extends Model
{

    use HasFactory, SoftDeletes;

    protected $table = 'iar_tbl';
    protected $primaryKey = 'id';
    protected $fillable = ['item_name',	'description',	'unit',	'quantity', 'forms'];
    protected $guarded = ['deleted_at',	'created_at',	'updated_at'];
}
