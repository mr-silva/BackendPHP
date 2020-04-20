<?php

require_once __DIR__ . '/vendor/autoload.php';

use Reweb\Job\Backend;

$accountOne = new Backend\CashMachine(10000, 1);
$accountTwo = new Backend\CashMachine(3000, 2);

$accountTwo -> transfer($accountOne -> transfer(2000, 1), 2);

$accountOne -> displayBalance();
$accountTwo -> displayBalance();

$accountTwo -> withdraw(1000);
$accountTwo -> displayBalance();


