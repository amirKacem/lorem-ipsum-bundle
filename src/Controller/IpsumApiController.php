<?php

namespace KnpU\LoremIpsumBundle\Controller;

use KnpU\LoremIpsumBundle\Event\FilterApiResponseEvent as EventFilterApiResponseEvent;
use KnpU\LoremIpsumBundle\KnpUIpsum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class IpsumApiController extends AbstractController
{
    /**
     * @var KnpUIpsum $knpUIpsum
     */
    private $knpUIpsum;

    /**
     * @var EventDispatcherInterface $eventDispatcher
     */
    private $eventDispatcher;

    public function __construct(KnpUIpsum $knpUIpsum, ?EventDispatcherInterface $eventDispatcher)
    {
        $this->knpUIpsum = $knpUIpsum;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function index()
    {
        $data = [
            'paragraphs' => $this->knpUIpsum->getParagraphs(),
            'sentences' => $this->knpUIpsum->getSentences(),
        ];

        $event = new EventFilterApiResponseEvent($data);

        if ($this->eventDispatcher !== null) {
            $this->eventDispatcher->dispatch($event);
        }

        return $this->json($event->getData());
    }
}
