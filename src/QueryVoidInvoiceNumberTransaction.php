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
   * @param \DOMDocument|NULL $document
   * @return \DOMDocument
   */
  public function toNode(DOMDocument $document = NULL) {
    $document = parent::toNode($document);

    $document->appendChild($document->createElement('REQ_TRANS_ID', $this->req_trans_id));

    return $document;
  }
}
