<?php

namespace Paymentree;

use DOMDocument;
use DOMNode;

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
   * @var DOMNode[]
   *   An array of DOMNodes to be appended to the transaction XML.
   */
  protected $child_nodes;

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
    $this->document = new DOMDocument();

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
    $root_element = $this->document->createElement('TRANS');

    // Generate all child nodes.
    $this->createNodes();

    foreach ($this->getNodes() as $node) {
      $root_element->appendChild($node);
    }

    $this->document->appendChild($root_element);

    return $this->document;
  }

  /**
   * Create nodes for the appropriate properties of the transaction.
   */
  protected function createNodes() {
    $this->addChildNode($this->createEscapedElement('REQUEST_TYPE', $this->getRequestType()));
    $this->addChildNode($this->createEscapedElement('ACTION_TYPE', $this->getActionType()));
  }

  /**
   * @param \DOMNode $node
   * @return $this
   */
  protected function addChildNode(DOMNode $node) {
    $this->child_nodes[] = $node;
    return $this;
  }

  /**
   * @return DOMNode[]
   */
  protected function getNodes() {
    return $this->child_nodes;
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
    $xml = $this->toNode()->saveXML();
    return trim(preg_replace('/<\?xml.*?>\w?/', '', $xml));
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
