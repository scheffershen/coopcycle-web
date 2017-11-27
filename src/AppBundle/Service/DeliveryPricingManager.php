<?php

namespace AppBundle\Service;

use AppBundle\Entity\Delivery;

class DeliveryPricingManager
{
    private $rules = [];

    public function setRules(array $rules)
    {
        $this->rules = $rules;

        return $this;
    }

    public function getPrice(Delivery $delivery)
    {
        foreach ($this->rules as $rule) {
            if ($rule->matches($delivery)) {
                return $rule->getPrice();
            }
        }
    }
}
