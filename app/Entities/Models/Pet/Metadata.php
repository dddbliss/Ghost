<?php

namespace Ghost\Entities\Models\Pet;

use Ghost\Entities\Models\Pet\Pet;
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
    protected $table = 'pets_metadata';

    /**
     * Fetch the metadata for the pet.
     *
     * @return objects Pet::class
     */
    public function pet() {
        return $this->belongsTo(Pet::class);
    }

}