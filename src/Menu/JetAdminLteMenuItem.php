<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Menu;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Lavary\Menu\Item;

class JetAdminLteMenuItem extends Item
{
    /**
     * @param $builder
     * @param $id
     * @param $title
     * @param $options
     * @return void
     */
    public function __construct($builder, $id, $title, $options)
    {
        $this->builder = $builder;
        $this->id = $id;
        $this->title = $title;
        $this->nickname = $options['nickname'] ?? Str::camel(Str::ascii($title));

        $this->attributes = $this->builder->extractAttributes($options);
        $this->parent = (is_array($options) && isset($options['parent'])) ? $options['parent'] : null;

        // Storing path options with each link instance.
        if (!is_array($options)) {
            $path = array('url' => $options);
        } elseif (isset($options['raw']) && $options['raw']) {
            $path = null;
        } else {
            $path = Arr::only($options, array('url', 'route', 'action', 'secure'));
        }
        if (isset($options['disableActivationByURL']) && $options['disableActivationByURL']) {
            $this->disableActivationByURL = true;
        }

        if (!is_null($path)) {
            $path['prefix'] = $this->builder->getLastGroupPrefix();
        }

        $this->link = $path ? (new JetAdminLteMenuLink($path, $this->builder))->attr(['class' => 'nav-link']) : null;

        // Activate the item if items's url matches the request uri
        if (true === $this->builder->conf('auto_activate')) {
            $this->checkActivationStatus();
        }
    }

    /**
     * @param array $classes
     * @return JetAdminLteMenuItem
     */
    public function icon(array $classes = [])
    {
        $className = implode(' ', $classes);
        return $this->prepend('<i class="nav-icon fa-fw ' . $className . '"></i>');
    }
}
