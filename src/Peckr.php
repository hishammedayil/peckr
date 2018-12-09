<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: hisham
 * Date: 12/1/2018
 * Time: 5:35 PM
 */

namespace Peckr;
use InvalidArgumentException;

/**
 * Class Peckr
 * @package Peckr
 */
class Peckr
{
    /**
     * @param $priorities
     * @return array
     */
    public function getPeckingOrder(array $priorities): array
    {
        if (empty($priorities)) {
            throw new InvalidArgumentException("Empty priority list passed.");
        }

        $numericPriorities = array_filter($priorities, "is_numeric");
        if ($numericPriorities !== $priorities) {
            throw new InvalidArgumentException("All priorities should be numeric.");
        }

        arsort($priorities);
        $order = [];
        $highestPossibleOrder = 0;
        $sampleSize = array_sum(array_values($priorities));

        foreach ($priorities as $key => $value) {
            $interval = ceil($sampleSize / $value);
            $start = $highestPossibleOrder;
            $skippedAndMoved = false;
            do {
                if(!empty($order[$start])) {
                    $start++;
                    $skippedAndMoved = true;
                    continue;
                }
                $order[$start] = $key;
                $start += $interval;
                if(true === $skippedAndMoved) {
                    $start--;
                    $skippedAndMoved = false;
                }
            }while ($start < $sampleSize);
        }
        ksort($order);
        return $order;
    }
}
