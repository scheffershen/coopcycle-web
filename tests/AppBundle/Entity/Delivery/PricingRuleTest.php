<?php

namespace AppBundle\Entity\Delivery;

use AppBundle\Entity\Delivery;
use AppBundle\Entity\Delivery\PricingRule;
use PHPUnit\Framework\TestCase;

class PricingRuleTest extends TestCase
{
    public function testMatches()
    {
        $rule = new PricingRule();
        $rule->setExpression('distance in 0..3000 and weight in 0..1000');

        $delivery = new Delivery();

        $delivery->setDistance(1500);
        $delivery->setWeight(500);
        $this->assertTrue($rule->matches($delivery));

        $delivery->setDistance(3500);
        $delivery->setWeight(500);
        $this->assertFalse($rule->matches($delivery));

        $delivery->setDistance(1500);
        $delivery->setWeight(1500);
        $this->assertFalse($rule->matches($delivery));
    }
}
