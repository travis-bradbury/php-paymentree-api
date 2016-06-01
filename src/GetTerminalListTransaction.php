<?php

namespace Paymentree;

class GetTerminalListTransaction extends Transaction {

  /**
   * GetTerminalListTransaction constructor.
   */
  public function __construct() {
    parent::__construct();

    $this->action_type = Paymentree::ACTION_TYPE_TERMINAL_CLOSE_LIST;
  }
}
