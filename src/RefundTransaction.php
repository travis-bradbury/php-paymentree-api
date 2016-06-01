<?php

namespace Paymentree;

class RefundTransaction extends PaymentRefundTransaction {

  /**
   * RefundTransaction constructor.
   */
  public function __construct() {
    parent::__construct();

    $this->action_type = Paymentree::ACTION_TYPE_REFUND;
  }
}
