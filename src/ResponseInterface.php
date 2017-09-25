<?php

namespace Paymentree;

use \DOMDocument;

interface ResponseInterface {
  public function __construct(DOMDocument $document);

  /**
   * @return string
   */
  public function getType();

  /**
   * @return string
   */
  public function getPayLinqTransactionId();

  /**
   * @return \DOMDocument
   */
  public function getDocument();

  /**
   * @return string
   */
  public function getChequeNumber();

  /**
   * @return string
   */
  public function getResponseCode();

  /**
   * @return string
   */
  public function getResponseMessage();

  /**
   * @return string
   */
  public function getCardType();

  /**
   * @return string
   */
  public function getProcessedAmount();

  /**
   * @return string
   */
  public function getCardCode();

  /**
   * @return string
   */
  public function getMerchantReceipt();

  /**
   * @return string
   */
  public function getCustomerReceipt();

  /**
   * @return string
   */
  public function getTransactionCode();

  /**
   * @return string
   */
  public function getTerminalId();

  /**
   * @return string
   */
  public function getTerminalReference();

}
