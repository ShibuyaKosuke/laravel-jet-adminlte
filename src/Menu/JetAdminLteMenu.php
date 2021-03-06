<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Menu;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Lavary\Menu\Builder;
use Lavary\Menu\Menu;

/**
 * @method bool exists($name)
 * @method Builder makeOnce($name, $callback)
 * @method array loadConf($name)
 * @method Builder get($key)
 * @method Collection getCollection()
 * @method Collection all()
 */
class JetAdminLteMenu extends Menu
{
    /**
     * Create a new menu builder instance.
     *
     * @param string $name
     * @param callable $callback
     * @param array $options (optional, it will be combined with the options to be applied)
     *
     * @return JetAdminLteMenuBuilder
     */
    public function make($name, $callback, array $options = [])
    {
        if (!is_callable($callback)) {
            return null;
        }

        if (!array_key_exists($name, $this->menu)) {
            $this->menu[$name] = new JetAdminLteMenuBuilder($name, array_merge($this->loadConf($name), $options));
        }

        // Registering the items
        $callback($this->menu[$name]);

        // Storing each menu instance in the collection
        $this->collection->put($name, $this->menu[$name]);

        // Make the instance available in all views
        View::share($name, $this->menu[$name]);

        return $this->menu[$name];
    }
}
