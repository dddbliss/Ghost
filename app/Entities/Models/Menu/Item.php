<?php

namespace Ghost\Entities\Models\Menu;

use Ghost\Entities\Models\Menu\Menu;
use Ghost\Entities\Models\Page\PageMetadata;
use Ghost\Entities\Traits\MetadataBase;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    
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
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus_items';

    /**
     * Fetch the menu this item belongs to.
     *
     * @return object Menu::class
     */
    public function menu() {
        return $this->belongsTo(Menu::class);
    }

}