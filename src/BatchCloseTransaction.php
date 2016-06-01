<?php

namespace Paymentree;

class BatchCloseTransaction extends Transaction {

  /**
   * @var string
   */
  protected $terminal_no;

  /**
   * BatchCloseTransaction constructor.
   * @param string $terminal_number
   */
  public function __construct($terminal_number = 'all') {
    parent::__construct();

    $this->setTerminal($terminal_number);

    $this->action_type = Paymentree::ACTION_TYPE_TERMINAL_CLOSE;
  }

  /**
   * @param string $terminal_number
   * @return $this
   */
  public function setTerminal($terminal_number) {
    $this->terminal_no = $terminal_number;
    return $this;
  }

  /**
   * @return string
   */
  public function getTerminal() {
    return $this->terminal_no;
  }

  /**
   * Create nodes for the appropriate properties of the transaction.
   */
  protected function createNodes() {
    parent::createNodes();
    $this->addChildNode($this->createEscapedElement('TERMINAL_NO', $this->getTerminal()));
  }
}
