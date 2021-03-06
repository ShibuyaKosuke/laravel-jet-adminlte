<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Menu;

use Lavary\Menu\Builder;
use Lavary\Menu\Collection;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class JetAdminLteMenuBuilder extends Builder
{
    /**
     * @param string $title
     * @param array $options
     * @return JetAdminLteMenuItem
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function raw($title, array $options = ['class' => 'nav-header'])
    {
        $options['raw'] = true;

        return $this->add($title, $options, false);
    }

    /**
     * @param string $title
     * @param array $options
     * @param boolean $wrap
     * @return JetAdminLteMenuItem
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function add($title, $options = [], bool $wrap = true)
    {
        $id = $options['id'] ?? $this->id();

        $title = app('translator')->get($title);

        $title = $wrap ? "<p>{$title}</p>" : $title;

        $item = new JetAdminLteMenuItem($this, $id, $title, $this->getClass($options));

        $this->items->push($item);

        return $item;
    }

    /**
     * @param array $options
     * @return array
     */
    private function getClass(array $options)
    {
        if (array_key_exists('class', $options)) {
            $classes = [];
            if (is_string($options['class'])) {
                $classes = explode(' ', $options['class']);
            } elseif (is_array($options['class'])) {
                $classes = $options['class'];
            }
            if (!in_array('nav-item', $classes, true)) {
                $classes[] = 'nav-item';
            }
            $options['class'] = implode(' ', $classes);
        } else {
            $options['class'] = 'nav-item';
        }
        return $options;
    }
}
