<?php

class SimpleProviderTest extends ...
{
    public function additionProvider() // returns an array of arrays
    {
        return [
            'adding zeros'  => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one'  => [1, 1, 3]
        ];
    }
    
    /**
     * @dataProvider additionProvider
     */
    public function testAdd($firstSummand, $secondSummand, $expectedSum)
    {
        $this->assertEquals($expectedSum, $firstSummand + $secondSummand);
    }
}
