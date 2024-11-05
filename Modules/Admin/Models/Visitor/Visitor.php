<?php

namespace Modules\Admin\Models\Visitor;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    // use HasFactory;

    public $timestamps = TRUE;

    protected $fillable = [
        'date',
        'ip'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */

    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];

}