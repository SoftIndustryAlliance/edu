<?php

namespace OOP\Structural\Composite;

/**
 * The Composite class that holds Leaf classes.
 */
class Report implements Renderable
{
    private $components = [];
    private $key;

    public function __construct(int $key)
    {
        $this->key = $key;
    }

    public function render(): string
    {
        $result = '';
        foreach ($this->components as $component) {
            $result .= $component->render();
        }
        return $result;
    }

    /**
     * Set the value of Components
     *
     * @param mixed $components
     *
     * @return self
     */
    public function addComponent(Renderable $component)
    {
        $this->components[] = $component;

        return $this;
    }

    /**
     * Get the value of Key
     *
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the value of Key
     *
     * @param mixed $key
     *
     * @return self
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }
}
