<?php

namespace Paymentree;

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
   * Create nodes for the appropriate properties of the transaction.
   */
  protected function createNodes() {
    parent::createNodes();
    $this->addChildNode($this->createEscapedElement('REQ_TRANS_ID', $this->getReqTransId()));
  }
}
