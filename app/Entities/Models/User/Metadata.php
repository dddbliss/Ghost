<?php

namespace Ghost\Entities\Models\User;

use Ghost\Entities\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class Metadata extends Model {

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
    protected $table = 'users_metadata';

    /**
     * Fetch the user this metadata belongs to.
     *
     * @return objects User::class
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

}