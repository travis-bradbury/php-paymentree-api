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
   */
  public function __construct() {
    parent::__construct();

    $this->action_type = Paymentree::ACTION_TYPE_COMMIT;
  }

  /**
   * @return string
   */
  public function getReqTransId() {
    return $this->req_trans_id;
  }

  /**
   * @param string $req_trans_id
   * @return $this
   */
  public function setReqTransId($req_trans_id) {
    $this->req_trans_id = $req_trans_id;
    return $this;
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
