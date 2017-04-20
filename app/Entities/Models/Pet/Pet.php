<?php

namespace Ghost\Entities\Models\Pet;

use Ghost\Entities\Models\Pet\Metadata;
use Ghost\Entities\Traits\MetadataBase;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model {
    
    use MetadataBase;
    
    /**
     * @var Fillable Array
     */
    protected $guarded = [''];

    /**
     * @var Fillable Array
     */
    protected $hidden = [''];

    /**
     * @var Fillable Array
     */
    protected $with = ['metadata'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pets';

    /**
     * Fetch the metadata for the pet.
     *
     * @return objects Metadata::class
     */
    public function metadata() {
        return $this->hasMany(Metadata::class);
    }

}