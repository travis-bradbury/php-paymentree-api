<?php

namespace Paymentree;

use \DOMDocument;

interface ResponseInterface {
  public function __construct(DOMDocument $document);
  public function getType();
  public function getPayLinqTransactionId();
  public function getDocument();
  public function getChequeNumber();
  public function getResponseCode();
  public function getResponseMessage();
  public function getCardType();
  public function getProcessedAmount();
  public function getCardCode();
  public function getMerchantReceipt();
  public function getCustomerReceipt();
  public function getTransactionCode();
}
