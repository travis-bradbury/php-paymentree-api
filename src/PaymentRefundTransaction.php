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
  public function __construct($params = []) {
    parent::__construct($params);
  }

  /**
   * @return string
   */
  public function getClient() {
    return $this->client;
  }

  /**
   * @param string $client_id
   * @return $this
   */
  public function setClient($client_id) {
    $this->client = $client_id;
    return $this;
  }

  /**
   * @return string
   */
  public function getLocation() {
    return $this->location;
  }

  /**
   * @param string $location
   * @return $this
   */
  public function setLocation($location) {
    $this->location = $location;
    return $this;
  }

  /**
   * @return string
   */
  public function getCashier() {
    return $this->cashier;
  }

  /**
   * @param string $cashier
   * @return $this
   */
  public function setCashier($cashier) {
    $this->cashier = $cashier;
    return $this;
  }

  /**
   * @return string
   */
  public function getReqTransId() {
    return $this->req_trans_id;
  }

  /**
   * @param string $id
   * @return $this
   */
  public function setReqTransId($id) {
    $this->req_trans_id = $id;
    return $this;
  }

  /**
   * @return int
   */
  public function getAmount() {
    return $this->amount;
  }

  /**
   * @param int $amount
   * @return $this
   */
  public function setAmount($amount) {
    $this->amount = $amount;
    return $this;
  }

  /**
   * @return string
   */
  public function getToken() {
    return $this->token;
  }

  /**
   * @param string $token
   * @return $this
   */
  public function setToken($token) {
    $this->token = $token;
    return $this;
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
