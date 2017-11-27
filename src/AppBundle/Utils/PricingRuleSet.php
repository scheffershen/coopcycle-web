<?php

namespace AppBundle\Utils;

class PricingRuleSet implements \IteratorAggregate , \Countable
{
    private $rules = [];

    public function __construct(array $rules = [])
    {
        $this->rules = $rules;
    }

    public function setRules(array $rules)
    {
        $this->rules = $rules;

        return $this;
    }

    public function getRules()
    {
        return $this->rules;
    }

    public function getIterator() {
        return new \ArrayIterator($this->rules);
    }

    public function count()
    {
        return count($this->rules);
    }
}
