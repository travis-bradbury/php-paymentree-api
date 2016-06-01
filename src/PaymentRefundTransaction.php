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
   */
  protected $register;

  /**
   * @var string
   * The Transaction ID from the POS.
   */
  protected $req_trans_id;

  /**
   * @var int
   * An amount in cents.
   */
  protected $amount;

  /**
   * @var string
   */
  protected $token;

  /**
   * PaymentRefundTransaction constructor.
   */
  public function __construct() {
    parent::__construct();
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
   * Create nodes for the appropriate properties of the transaction.
   */
  protected function createNodes() {
    parent::createNodes();

    if (isset($this->client)) {
      $this->addChildNode($this->createEscapedElement('CLIENT', $this->client));
    }

    if (isset($this->location)) {
      $this->addChildNode($this->createEscapedElement('LOCATION', $this->location));
    }

    if (isset($this->register)) {
      $this->addChildNode($this->createEscapedElement('REGISTER', $this->register));
    }

    if (isset($this->cashier)) {
      $this->addChildNode($this->createEscapedElement('CASHIER', $this->cashier));
    }

    if (isset($this->req_trans_id)) {
      $this->addChildNode($this->createEscapedElement('REQ_TRANS_ID', $this->req_trans_id));
    }

    if (isset($this->amount)) {
      $this->addChildNode($this->createEscapedElement('AMOUNT', $this->amount));
    }

    if (isset($this->token)) {
      $this->addChildNode($this->createEscapedElement('TOKEN', $this->token));
    }
  }
}
