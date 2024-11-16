<?php

namespace KnpU\LoremIpsumBundle\Event;

use Symfony\Contracts\EventDispatcher\Event;

class FilterApiResponseEvent extends Event
{
    /**
     * @var array $data
     */
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData(array $data)
    {
        $this->data = $data;
    }
}
