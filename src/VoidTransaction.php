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
   */
  public function __construct() {
    parent::__construct();

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
   * @return \DOMDocument
   */
  public function toNode() {
    $document = parent::toNode();

    $document->appendChild($this->createEscapedElement('TRANS_ID_TO_VOID', $this->trans_id_to_void));

    return $document;
  }
}
