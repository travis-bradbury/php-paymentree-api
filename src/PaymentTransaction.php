<?php

namespace Paymentree;

class PaymentTransaction extends PaymentRefundTransaction {

  /**
   * PaymentTransaction constructor.
   */
  public function __construct() {
    parent::__construct();

    $this->action_type = Paymentree::ACTION_TYPE_PURCHASE;
  }
}
