<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RLSDDSP extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rlsddsp';
    protected $primaryKey = 'rlsddsp_id';
    protected $fillable = ['item_id',	'rlsddsp_dept',  'rlsddsp_acc_offcr', 'rlsddsp_desg', 'rlsddsp_pol', 'rlsddsp_pol_sta', 'rlsddsp_pol_date', 'rlsddsp_no', 'rlsddsp_date', 'ics_id', 'ics_no', 'ics_date'];
    protected $guarded = ['deleted_at',	'created_at',	'updated_at'];
}
