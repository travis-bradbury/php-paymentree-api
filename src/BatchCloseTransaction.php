<?php

namespace Paymentree;

use DOMDocument;

class BatchCloseTransaction extends Transaction {

  /**
   * @var string
   */
  protected $terminal_no;

  /**
   * BatchCloseTransaction constructor.
   * @param array $params
   */
  public function __construct($params = []) {
    parent::__construct($params);

    if (empty($params['terminal_no'])) {
      $this->terminal_no = 'all';
    }

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
   * @param \DOMDocument|NULL $document
   * @return \DOMDocument
   */
  public function to_node(DOMDocument $document = NULL) {
    $document = parent::to_node($document);

    $document->appendChild($document->createElement('TERMINAL_NO', $this->terminal_no));

    return $document;
  }
}
