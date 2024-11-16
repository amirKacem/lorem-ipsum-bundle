<?php

namespace KnpU\LoremIpsumBundle\Tests\Util;

use KnpU\LoremIpsumBundle\KnpWordProviderInterface;

class StubWordList implements KnpWordProviderInterface {

    public function getWordList(): array
     {
        return ['stub', 'stub2'];
    }

}