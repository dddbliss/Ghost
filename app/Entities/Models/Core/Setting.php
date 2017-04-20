<?php

namespace Ghost\Entities\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
    
    /**
     * @var Fillable Array
     */
    protected $guarded = [''];

    /**
     * @var Fillable Array
     */
    protected $hidden = [''];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

}