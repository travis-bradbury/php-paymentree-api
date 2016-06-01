<?php

namespace Paymentree;

use DOMDocument;

class QueryVoidInvoiceNumberTransaction extends Transaction {

  /**
   * @var string
   */
  protected $req_trans_id;

  /**
   * QueryVoidInvoiceNumberTransaction constructor.
   */
  public function __construct() {
    parent::__construct();

    $this->action_type = Paymentree::ACTION_TYPE_QUERY_VOID;
  }

  /**
   * @return \DOMDocument
   */
  public function toNode() {
    $document = parent::toNode();

    $document->appendChild($this->createEscapedElement('REQ_TRANS_ID', $this->req_trans_id));

    return $document;
  }
}
