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
   * @param \DOMDocument|NULL $document
   * @return \DOMDocument
   */
  public function toNode(DOMDocument $document = NULL) {
    $document = parent::toNode($document);

    $document->appendChild($document->createElement('TERMINAL_NO', $this->terminal_no));

    return $document;
  }
}
