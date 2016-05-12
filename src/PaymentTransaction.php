<?php

namespace Paymentree;

use DOMDocument;

class PaymentTransaction extends Transaction {

  /**
   * @var string
   */
  protected $ip_address;

  /**
   * @var int
   */
  protected $port;

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
   */
  protected $req_trans_id;

  /**
   * @var string
   */
  protected $request_type;

  /**
   * @var string
   */
  protected $action_type;

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
   * Trans constructor.
   * @param string $ip_address
   * The IP address of the Paymentree installation. If not provided, localhost
   * is used.
   * @param int $port
   * The Port that Paymentree is listening on. Defaults to 32000.
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
  public function __construct($ip_address = NULL, $port = NULL, $params = array()) {
    if (!$ip_address) {
      $ip_address = Paymentree::$DEFAULT_LOCAL_IP_ADDRESS;
    }
    
    if (!$port) {
      $port = Paymentree::DEFAULT_PORT;
    }
    
    $this->ip_address = $ip_address;

    $this->port = $port;
    
    parent::__construct($params);
  }

  /**
   * @param \DOMDocument|NULL $document
   */
  public function toNode(DOMDocument $document = NULL) {
    if (!$document) {
      $document = new DOMDocument();
    }

    $node = $document->createElement('TRANS');
  }
}
