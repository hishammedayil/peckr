<?php
use Peckr\Peckr;

require('vendor/autoload.php');

$peckr = new Peckr();

//$input = ['a' => 3, 'b' => 2, 'c' => 2, 'd' => 2, 'e' => 1];
//$order = $peckr->getPeckingOrder($input);
//dump($input, $order);
//dump("=====================");

$input2 = ['a' => 2, 'b' => 3, 'c' => 5, 'd' => 2, 'e' => 1];
dump($input2);
$order2 = $peckr->getPeckingOrder($input2);
dump($order2);
