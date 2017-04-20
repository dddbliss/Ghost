<?php

namespace Ghost\Entities\Models\Page;

use Ghost\Entities\Models\Page\Metadata;
use Ghost\Entities\Traits\MetadataBase;
use Illuminate\Database\Eloquent\Model;

class Page extends Model {
    
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
    protected $table = 'pages';

    /**
     * Fetch the metadata for the page.
     *
     * @return objects Metadata::class
     */
    public function metadata() {
        return $this->hasMany(Metadata::class);
    }

    /**
     * Fetch data for the users using the '__get' magic method.
     *
     * @since 1.0
     * @param string $data  The data to look-up in the metadata table.
     * @return string
     */
    public function __get($data) {
        // Check if the column exists
        if(array_key_exists($data, $this->attributes)) {
            // Return the attribute
            return $this->attributes[$data];
        }

        // Loop through the metadata
        foreach($this->relations['metadata'] as $metadata) {
            if($metadata->attributes['key'] == $data) {
                return $metadata->attributes['value'];
            }
        }
    }

}