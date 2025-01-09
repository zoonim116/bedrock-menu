<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use stdClass;

class MegamenuComponent extends Component
{

    public $rootElements;
    public $childElements;
    protected $themeLocation;
    protected $locations;
    protected $rawMenuItems;

    /**
     * Create a new component instance.
     */
    public function __construct($location)
    {
        $this->themeLocation = $location;
        $this->locations = get_nav_menu_locations();
        $this->rawMenuItems = wp_get_nav_menu_items($this->locations[$this->themeLocation]) ?? [];
        $this->rootElements = $this->geRootsMenuItems();
        $this->childElements = $this->geChildersMenuItems();
    }

    private function getMenuItems(): array {
        return wp_get_nav_menu_items($this->locations[$this->themeLocation]);
    }

    public function geRootsMenuItems(): array
    {
        if($this->themeLocation && isset($this->locations[$this->themeLocation]))
        {
            $items = array_filter($this->getMenuItems(), function($item) {
                return intval($item->menu_item_parent) == 0;
            });
            return array_map(function($item) {
                $obj = new StdClass;
                $obj->url = $item->url;
                $obj->title = $item->title;
                $obj->id = $item->ID;
                $obj->hasChildren = (bool)array_filter($this->rawMenuItems, function($rawItem) use ($item) {
                    return intval($rawItem->menu_item_parent) == $item->ID;
                });
                return $obj;
            }, $items);
        }
        return [];
    }

    public function geChildersMenuItems(): array
    {
        if(count($this->rootElements)) {
            $result = [];
            foreach($this->rootElements as $rootElement) {
                if ($rootElement->hasChildren) {
                    $items = array_filter($this->rawMenuItems, function($item) use ($rootElement) {
                        return intval($item->menu_item_parent) == $rootElement->id;
                    });
                    $result[$rootElement->id] = array_map(function($item) {
                        $obj = new StdClass;
                        $obj->url = $item->url;
                        $obj->title = $item->title;
                        $obj->id = $item->ID;
                        $obj->image = (object) get_field("nav_item_preview", $item->ID);
                        return $obj;
                    }, $items);
                }
            }
            return $result;
        }
        return [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if($this->themeLocation && isset($this->locations[$this->themeLocation]))
        {
            return view('components.megamenu-component');
        }
        return '';
    }
}
