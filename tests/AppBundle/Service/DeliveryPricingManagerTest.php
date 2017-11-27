<?php

namespace AppBundle\Service;

use AppBundle\Entity\Delivery;
use AppBundle\Entity\Delivery\PricingRule;
use AppBundle\Service\DeliveryPricingManager;
use PHPUnit\Framework\TestCase;

class DeliveryPricingManagerTest extends TestCase
{
    public function testGetPrice()
    {
        $rule1 = new PricingRule();
        $rule1->setExpression('distance in 0..3000');
        $rule1->setPrice(5.99);

        $rule2 = new PricingRule();
        $rule2->setExpression('distance in 3000..5000');
        $rule2->setPrice(6.99);

        $rule3 = new PricingRule();
        $rule3->setExpression('distance in 5000..7500');
        $rule3->setPrice(8.99);

        $manager = new DeliveryPricingManager();
        $manager->setRules([
            $rule1,
            $rule2,
            $rule3,
        ]);

        $delivery = new Delivery();
        $delivery->setDistance(1500);

        $this->assertEquals(5.99, $manager->getPrice($delivery));
    }
}
