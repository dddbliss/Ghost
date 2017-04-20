<?php

namespace Ghost\Entities\Models\Menu;

use Ghost\Entities\Models\Menu\Item;
use Ghost\Entities\Models\Page\PageMetadata;
use Ghost\Entities\Traits\MetadataBase;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model {
    
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
    protected $with = ['items'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * Fetch the items in this menu.
     *
     * @return objects Item::class
     */
    public function items() {
        return $this->hasMany(Item::class);
    }

}