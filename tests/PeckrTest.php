<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: hisham
 * Date: 12/1/2018
 * Time: 4:36 PM
 */
use Peckr\Peckr;
use PHPUnit\Framework\TestCase;

/**
 * Class PeckrTest
 */
class PeckrTest extends TestCase
{
    /**
     * @dataProvider peckingDataProvider
     * @param array $input
     * @param array $output
     */
    public function testPeckrSetsPeckingOrder(array $input, array $output): void
    {
        $peckr = new Peckr();
        $order = $peckr->getPeckingOrder($input);
        static::assertEquals($output, $order);
    }

    /**
     * @param mixed|array $input
     * @expectedException InvalidArgumentException
     * @dataProvider invalidPeckingDataProvider
     */
    public function testPeckrThrowsExceptionOnInvalidInputs($input): void
    {
        $peckr = new Peckr();
        $peckr->getPeckingOrder($input);
    }

    /**
     * @return array
     */
    public function peckingDataProvider(): array
    {
        return [
            [
                ['a' => 3, 'b' => 2, 'c' => 2, 'd' => 1],
                ['a', 'b', 'c', 'a', 'b', 'c', 'a', 'd']
            ],
            [
                ['a' => 3, 'b' => 2, 'c' => 2, 'd' => 2, 'e' => 1],
                ['a', 'b', 'c', 'd', 'a', 'b', 'c', 'd', 'a', 'e']
            ]
        ];
    }

    /**
     * @return array
     */
    public function invalidPeckingDataProvider(): array
    {
        return [
            [['a' => 1, 'b' => 'abc']],
            [[]]
        ];
    }
}
