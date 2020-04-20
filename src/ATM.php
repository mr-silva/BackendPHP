<?php

namespace Reweb\Job\Backend;

class ATM {
  public function __construct($balance, $accountType) {
    $this -> balance = $balance;
    $this -> accountType = $accountType;
  }
  
  public function deposit($value) {
    if($value < 2) {
      return $this -> errorMessage(3);
    }
    return $this -> balance += $value;
  }

  public function withdraw($value) {
    switch($this -> accountType) {
      case 1:
        $withdrawTax = 2.50;
        if($value > $this -> balance) {
          return $this -> errorMessage(1);
        } 
        if($value > 600) {
          return $this -> errorMessage(2);
        }
        return $this -> balance -= $value + $withdrawTax;
      break;
      case 2:
        $withdrawTax = 0.80;
        if($value > $this -> balance) {
          return $this -> errorMessage(1);
        } 
        if($value > 1000) {
          return $this -> errorMessage(2);
        }
        return $this -> balance -= $value + $withdrawTax;
      break;
    }
  }

  public function transfer($value, $operationType) {
    switch($operationType) {
      case 1:
        if($value > $this -> balance) {
          return $this -> errorMessage(1);
        }
        $this -> balance -= $value;
        return $value;
      break;
      case 2:
        return $this -> balance += $value;
      break;
    }
  }

  public function displayBalance() {
    echo "\nB$ " . $this -> balance;
  }

  public function errorMessage($error) {
    switch($error) {
      case 1:
        echo "\nerror: Insuficient funds.";
      break;
      case 2:
        echo "\nerror: Operation value exceeded.";
      break;
      case 3:
        echo "\nerror: Minimun deposit value is B$ 2.00";
      break;
    }
  }
}
