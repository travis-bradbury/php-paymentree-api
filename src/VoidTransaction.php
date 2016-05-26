<?php

namespace Paymentree;

use DOMDocument;

class VoidTransaction extends PaymentRefundTransaction {

  /**
   * @var string
   */
  protected $trans_id_to_void;

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
   * @param \DOMDocument|NULL $document
   * @return \DOMDocument
   */
  public function to_node(DOMDocument $document = NULL) {
    $document = parent::to_node($document);

    $document->appendChild($document->createElement('TRANS_ID_TO_VOID', $this->trans_id_to_void));

    return $document;
  }
}
