<?php namespace Siegerhansma\AcumulusPhp\Parsers;


use Siegerhansma\AcumulusPhp\Models\Entry;

class EntryParser extends Parser implements ParserInterface{


    function __construct($entry)
    {
        $this->entry = $entry;
    }

    public function parse()
    {
        $model = new Entry;
       return $this->buildModel($this->entry, $model);
    }
}