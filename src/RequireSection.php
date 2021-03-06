<?php

namespace Nadar\PhpComposerReader;

use Iterator;

/**
 * Require Section Iterator.
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class RequireSection extends DataIterator implements Iterator
{
    const SECTION_KEY = 'require';

    protected $reader;
    
    public function __construct(ComposerReaderInterface $reader)
    {
        $this->reader = $reader;
        $this->loadData();
    }
    
    /**
     * @inheritDoc
     */
    public function assignIteratorData()
    {
        return $this->reader->contentSection(self::SECTION_KEY, []);
    }

    /**
     * @inheritDoc
     */
    public function createIteratorItem()
    {
        return new Package($this->reader, $this->key(), current($this->data));
    }
}
