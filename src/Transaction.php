<?php

namespace Paymentree;

use DOMDocument;

class Transaction {

  /**
   * @var string
   * The type of transaction.
   */
  protected $type;

  /**
   * @var int
   * TODO must be required.
   */
  protected $request_type;

  /**
   * @var int
   * TODO must be required.
   */
  protected $action_type;

  /**
   * Transaction constructor.
   * @param array $params
   * An array of parameters to add to the transaction.
   */
  public function __construct($params = array()) {
    $this->request_type = Paymentree::REQUEST_TYPE;

    // TODO this allows overriding properties that it shouldn't. $type, for one.
    foreach($params as $key => $value) {
      if(isset($this->$key)) {
        $this->$key = $value;
      }
      else {
        throw new \InvalidArgumentException($key . ' is not a valid parameter for a transaction of type ' . $this->getType() . '.');
      }
    }
  }

  /**
   * @return string
   * The type of transaction.
   */
  public function getType() {
    return (isset($this->type)) ? $this->type : static::class;
  }

  /**
   * @return int
   */
  public function getActionType() {
    return $this->action_type;
  }

  /**
   * @param int $type
   * @return $this
   */
  public function setActionType($type) {
    $this->action_type = $type;
    return $this;
  }

  /**
   * @return int
   */
  public function getRequestType() {
    return $this->request_type;
  }

  /**
   * @param int $type
   * @return $this
   */
  public function setRequestType($type) {
    $this->request_type = $type;
    return $this;
  }

  /**
   * @param \DOMDocument $document
   * @return \DOMDocument
   */
  public function to_node(DOMDocument $document = NULL) {
    if (!$document) {
      $document = new DOMDocument();
    }

    $node = $document->createElement('TRANS');
    $node->appendChild($document->createElement('REQUEST_TYPE', $this->request_type));
    $node->appendChild($document->createElement('ACTION_TYPE', $this->action_type));

    $document->appendChild($node);

    return $document;
  }

  /**
   * @return string
   */
  public function to_string() {
    return $this->to_node()->saveXML();
  }

  /**
   * @return \Paymentree\Response
   */
  public function send() {
    $connection = Paymentree::connect();
    $response = $connection->send($this->to_string());
    return Paymentree::load_response($response);
  }
}
