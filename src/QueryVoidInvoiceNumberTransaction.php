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
   * @param array $params
   */
  public function __construct($params = []) {
    parent::__construct($params);

    $this->action_type = Paymentree::ACTION_TYPE_QUERY_VOID;
  }

  /**
   * @param \DOMDocument|NULL $document
   * @return \DOMDocument
   */
  public function to_node(DOMDocument $document = NULL) {
    $document = parent::to_node($document);

    $document->appendChild($document->createElement('REQ_TRANS_ID', $this->req_trans_id));

    return $document;
  }
}
