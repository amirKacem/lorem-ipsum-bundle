<?php

namespace KnpU\LoremIpsumBundle;

interface KnpWordProviderInterface {

    /**
     * Returns array of words to use for fake text
     * 
     * @return array
     */
    public function  getWordList() : array;
}