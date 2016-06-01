<?php

namespace Paymentree;

interface TransactionInterface {

  public function getType();
  public function toNode();
  public function toString();
  public function send();
}
