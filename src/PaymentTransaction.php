<?php

namespace Paymentree;

class PaymentTransaction extends PaymentRefundTransaction {

  /**
   * PaymentTransaction constructor.
   * @param array $params
   * Values for the transaction. Possible keys are:
   * - client
   * - location
   * - register
   * - cashier
   * - req_trans_id
   * - amount
   * - token
   */
  public function __construct($params) {
    parent::__construct($params);

    $this->action_type = Paymentree::ACTION_TYPE_PURCHASE;
  }
}
