<?php

namespace Ghost\Entities\Models\Page;

use Ghost\Entities\Models\Page\Page;
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
    protected $table = 'pages_metadata';

    /**
     * Fetch the page this metadata belongs to.
     *
     * @return object Page::class
     */
    public function page() {
        return $this->belongsTo(Page::class);
    }

}