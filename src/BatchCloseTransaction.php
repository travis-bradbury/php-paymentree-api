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
  public function __construct(array $params) {
    parent::__construct($params);

    $this->action_type = Paymentree::ACTION_TYPE_TERMINAL_CLOSE;
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
