<?php

namespace Paymentree;

class CashResponse extends Response {
  public function __construct($response) {
    parent::__construct($response);
    $this->type = Paymentree::RESPONSE_TYPE_CASH;
  }
}
