<?php

namespace Paymentree;

use DOMDocument;

class Transaction implements TransactionInterface {

  /**
   * @var string
   * The type of transaction.
   */
  protected $type;

  /**
   * @var \DOMDocument
   */
  protected $document;

  /**
   * @var string
   */
  protected $request_type;

  /**
   * @var string
   */
  protected $action_type;

  /**
   * Transaction constructor.
   */
  public function __construct() {
    $this->request_type = Paymentree::REQUEST_TYPE;
  }

  /**
   * @return string
   * The type of transaction.
   */
  public function getType() {
    return (isset($this->type)) ? $this->type : static::class;
  }

  /**
   * @return string
   */
  public function getActionType() {
    return $this->action_type;
  }

  /**
   * @param string $type
   * @return $this
   */
  public function setActionType($type) {
    $this->action_type = $type;
    return $this;
  }

  /**
   * @return string
   */
  public function getRequestType() {
    return $this->request_type;
  }

  /**
   * @param string $type
   * @return $this
   */
  public function setRequestType($type) {
    $this->request_type = $type;
    return $this;
  }

  /**
   * @return \DOMDocument
   */
  public function toNode() {
    if (!$this->document) {
      $this->document = new DOMDocument();
    }

    $node = $this->document->createElement('TRANS');
    $node->appendChild($this->createEscapedElement('REQUEST_TYPE', $this->request_type));
    $node->appendChild($this->createEscapedElement('ACTION_TYPE', $this->action_type));
    $this->document->appendChild($node);

    return $this->document;
  }

  /**
   * Helper for creating an element with escaped content.
   * @param string $element
   * @param string $value
   * @return \DOMElement
   */
  protected function createEscapedElement($element, $value) {
    $node = $this->document->createElement($element);
    $content = $this->document->createTextNode($value);
    $node->appendChild($content);
    return $node;
  }

  /**
   * @return string
   */
  public function toString() {
    return $this->toNode()->saveXML();
  }

  /**
   * @return \Paymentree\ResponseInterface
   */
  public function send() {
    Paymentree::setLastTransaction($this);
    $connection = Paymentree::connect();
    $response = $connection->send($this->toString());
    return Paymentree::loadResponse($response);
  }
}
