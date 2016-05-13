<?php

namespace Paymentree;

use DOMDocument;

class PaymentRefundTransaction extends Transaction {

  /**
   * @var string
   * The Client License Number.
   */
  protected $client;

  /**
   * @var string
   */
  protected $location;

  /**
   * @var string
   */
  protected $cashier;

  /**
   * @var string
   * The Transaction ID from the POS.
   * TODO required
   */
  protected $req_trans_id;

  /**
   * @var int
   * An amount in cents.
   * TODO required
   */
  protected $amount;

  /**
   * @var string
   */
  protected $token;

  /**
   * PaymentRefundTransaction constructor.
   * @param array $params
   * Values for the transaction. Possible keys are:
   * - client
   * - location
   * - register
   * - cashier
   * - req_trans_id
   * - request_type
   * - action_type
   * - amount
   * - token
   */
  public function __construct($params = array()) {
    parent::__construct($params);
  }

  /**
   * @param \DOMDocument|NULL $document
   * @return \DOMDocument
   */
  public function to_node(DOMDocument $document = NULL) {
    $document = parent::to_node($document);

    if (isset($this->client)) {
      $document->appendChild($document->createElement('CLIENT', $this->client));
    }

    if (isset($this->location)) {
      $document->appendChild($document->createElement('LOCATION', $this->location));
    }

    if (isset($this->cashier)) {
      $document->appendChild($document->createElement('CASHIER', $this->cashier));
    }

    if (isset($this->req_trans_id)) {
      $document->appendChild($document->createElement('REQ_TRANS_ID', $this->req_trans_id));
    }

    if (isset($this->amount)) {
      $document->appendChild($document->createElement('AMOUNT', $this->amount));
    }

    if (isset($this->token)) {
      $document->appendChild($document->createElement('TOKEN', $this->token));
    }
  }
}
