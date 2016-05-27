<?php

namespace Paymentree;

use DOMDocument;

class CommitTransaction extends Transaction {

  /**
   * @var string
   */
  protected $req_trans_id;

  /**
   * CommitTransaction constructor.
   * @param array $params
   */
  public function __construct($params = []) {
    parent::__construct($params);

    $this->action_type = Paymentree::ACTION_TYPE_COMMIT;
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
