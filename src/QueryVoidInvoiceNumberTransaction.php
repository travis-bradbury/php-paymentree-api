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
   * Create nodes for the appropriate properties of the transaction.
   */
  protected function createNodes() {
    parent::createNodes();
    $this->addChildNode($this->createEscapedElement('REQ_TRANS_ID', $this->req_trans_id));
  }
}
