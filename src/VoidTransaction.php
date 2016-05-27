<?php

namespace Paymentree;

use DOMDocument;

class VoidTransaction extends PaymentRefundTransaction {

  /**
   * @var string
   */
  protected $trans_id_to_void;

  /**
   * @var string
   */
  protected $register;

  /**
   * VoidTransaction constructor.
   * @param array $params
   * Values for the transaction. Possible keys are:
   * - client
   * - location
   * - register
   * - cashier
   * - req_trans_id
   * - trans_id_to_void
   * - amount
   * - token
   */
  public function __construct($params = []) {
    parent::__construct($params);

    $this->action_type = Paymentree::ACTION_TYPE_PURCHASE;
  }

  /**
   * @return string
   */
  public function getTransIdToVoid() {
    return $this->trans_id_to_void;
  }

  /**
   * @param string $id
   * @return $this
   */
  public function setTransIdToVoid($id) {
    $this->trans_id_to_void = $id;
    return $this;
  }

  /**
   * @return string
   */
  public function getRegister() {
    return $this->register;
  }

  /**
   * @param string $register
   * @return $this
   */
  public function setRegister($register) {
    $this->register = $register;
    return $this;
  }

  /**
   * @param \DOMDocument|NULL $document
   * @return \DOMDocument
   */
  public function toNode(DOMDocument $document = NULL) {
    $document = parent::toNode($document);

    $document->appendChild($document->createElement('TRANS_ID_TO_VOID', $this->trans_id_to_void));

    return $document;
  }
}
