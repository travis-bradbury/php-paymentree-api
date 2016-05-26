<?php

namespace Paymentree;

class GetTerminalListTransaction extends Transaction {

  /**
   * GetTerminalListTransaction constructor.
   * @param array $params
   */
  public function __construct($params = []) {
    parent::__construct($params);

    $this->action_type = Paymentree::ACTION_TYPE_TERMINAL_CLOSE_LIST;
  }
}
