<?php

namespace Paymentree;

use \DOMDocument;
use \DOMException;

class Response {

  /**
   * @var string
   */
  protected $type;

  /**
   * @var string
   */
  protected $pay_linq_trans_id;

  /**
   * @var string
   * Used for TablePay only.
   */
  protected $check_no;

  /**
   * @var int
   */
  protected $trans_resp_code;

  /**
   * @var string
   */
  protected $trans_resp_msg;

  /**
   * @var string
   */
  protected $card_type_used;

  /**
   * @var int
   */
  protected $processed_amount;

  /**
   * @var string
   */
  protected $card_code;

  /**
   * @var string
   */
  protected $merchant_receipt;

  /**
   * @var string
   */
  protected $customer_receipt;

  /**
   * @var string
   */
  protected $server_number;

  /**
   * @var int
   * "Status of current transaction." Max length 2.
   */
  protected $transaction_status;

  /**
   * @var string
   * Used for TablePay only.
   */
  protected $transaction_code;

  /**
   * @var string
   * Terminal generated reference number.
   */
  protected $terminal_reference;

  /**
   * @var string
   */
  protected $host_response_message;

  /**
   * @var int
   */
  protected $host_response_code;

  /**
   * @var int
   */
  protected $batch_number;

  /**
   * @var string
   */
  protected $terminal_id;

  /**
   * @var \DOMDocument
   * A DOMDocument object representing the response.
   */
  protected $document;

  /**
   * Response constructor.
   * @param \DOMDocument $response
   * @throws \DOMException
   */
  public function __construct(DOMDocument $response) {
    $this->type = Paymentree::RESPONSE_TYPE_GENERIC;
    $this->document = $response;

    if ($id = $this->getDocumentContent('PAYLinqTransId')) {
      $this->setPayLinqTransactionId($id);
    }

    if (FALSE !== $code = $this->getDocumentContent('TransRespCode')) {
      $this->setResponseCode($code);
    }

    if ($message = $this->getDocumentContent('TransRespMsg')) {
      $this->setResponseMessage($message);
    }

    if ($type = $this->getDocumentContent('CardTypeUsed')) {
      $this->setCardType($type);
    }

    if ($number = $this->getDocumentContent('CheckNo')) {
      $this->setChequeNumber($number);
    }

    if ($amount = $this->getDocumentContent('ProcessedAmount')) {
      $this->setProcessedAmount((int) $amount);
    }

    if ($code = $this->getDocumentContent('CardCode')) {
      $this->setCardCode($code);
    }

    if ($receipt = $this->getDocumentContent('MerchantReceipt')) {
      $this->setMerchantReceipt($receipt);
    }

    if ($receipt = $this->getDocumentContent('CustomerReceipt')) {
      $this->setCustomerReceipt($receipt);
    }

    if ($server_number = $this->getDocumentContent('ServerNumber')) {
      $this->setServerNumber($server_number);
    }

    if ($transaction_code = $this->getDocumentContent('TransactionCode')) {
      $this->setTransactionCode($transaction_code);
    }

    if ($transaction_status = $this->getDocumentContent('TransactionStatus')) {
      $this->setTransactionStatus($transaction_status);
    }

    if ($message = $this->getDocumentContent('HostResponseMsg')) {
      $this->setHostResponseMessage($message);
    }

    if ($code = $this->getDocumentContent('HostResponseCode')) {
      $this->setHostResponseCode($code);
    }

    if ($number = $this->getDocumentContent('BatchNo')) {
      $this->setBatchNumber($number);
    }

    if ($reference = $this->getDocumentContent('TerminalReference')) {
      $this->setTerminalReference($reference);
    }

    if ($id = $this->getDocumentContent('TerminalID')) {
      $this->setTerminalId($id);
    }
  }

  /**
   * Get the value of a node in the response's XML.
   * This takes only the value of the first tag; use getDocumentContentMultiple
   * if you expect more.
   * @param string $tagName
   * @return string|NULL
   */
  protected function getDocumentContent($tagName) {
    $list = $this->document->getElementsByTagName($tagName);
    if ($item = $list->item(0)) {
      return $item->nodeValue;
    };
    return NULL;
  }

  /**
   * Get the contents of tags in the response's XML.
   * @param $tagName
   * @return array
   */
  protected function getDocumentContentMultiple($tagName) {
    $content = [];

    $list = $this->document->getElementsByTagName($tagName);
    for ($i = 0; $i < $list->length; $i++) {
      $item = $list->item($i);
      if ($value = $item->nodeValue) {
        $content[] = $value;
      }
    }
  }

  /**
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @return string
   */
  public function getPayLinqTransactionId() {
    return $this->pay_linq_trans_id;
  }

  /**
   * @param $id
   * @return $this
   */
  protected function setPayLinqTransactionId($id) {
    $this->pay_linq_trans_id = $id;
    return $this;
  }

  /**
   * Used for TablePay only.
   * @return string
   */
  public function getCheckNumber() {
    return $this->getChequeNumber();
  }

  /**
   * @param $number
   * @return $this
   */
  protected function setCheckNumber($number) {
    return $this->setChequeNumber($number);
  }

  /**
   * Used for TablePay only.
   * @return string
   */
  public function getChequeNumber() {
    return $this->check_no;
  }

  /**
   * @param $number
   * @return $this
   */
  protected function setChequeNumber($number) {
    $this->check_no = $number;
    return $this;
  }

  /**
   * @return string
   */
  public function getResponseCode() {
    return $this->trans_resp_code;
  }

  /**
   * @param $id
   * @return $this
   */
  protected function setResponseCode($id) {
    $this->trans_resp_code = $id;
    return $this;
  }

  /**
   * @return string
   */
  public function getResponseMessage() {
    return $this->trans_resp_msg;
  }

  /**
   * @param $message
   * @return $this
   */
  protected function setResponseMessage($message) {
    $this->trans_resp_msg = $message;
    return $this;
  }

  /**
   * @return string
   */
  public function getCardType() {
    return $this->card_type_used;
  }

  /**
   * @param $type
   * @return $this
   */
  protected function setCardType($type) {
    $this->card_type_used = $type;
    return $this;
  }


  /**
   * @return string
   */
  public function getProcessedAmount() {
    return $this->processed_amount;
  }

  /**
   * @param int $amount
   * @return $this
   */
  protected function setProcessedAmount($amount) {
    $this->processed_amount = $amount;
    return $this;
  }

  /**
   * @return string
   */
  public function getCardCode() {
    return $this->card_code;
  }

  /**
   * @param $code
   * @return $this
   */
  protected function setCardCode($code) {
    $this->card_code = $code;
    return $this;
  }

  /**
   * @return string
   */
  public function getMerchantReceipt() {
    return $this->merchant_receipt;
  }

  /**
   * @param $receipt
   * @return $this
   */
  protected function setMerchantReceipt($receipt) {
    $this->merchant_receipt = $receipt;
    return $this;
  }

  /**
   * @return string
   */
  public function getCustomerReceipt() {
    return $this->customer_receipt;
  }

  /**
   * @param $receipt
   * @return $this
   */
  protected function setCustomerReceipt($receipt) {
    $this->customer_receipt = $receipt;
    return $this;
  }

  /**
   * @return string
   */
  public function getServerNumber() {
    return $this->server_number;
  }

  /**
   * @param string $number
   * @return $this
   */
  protected function setServerNumber($number) {
    $this->server_number = $number;
    return $this;
  }

  /**
   * @return int
   */
  public function getTransactionStatus() {
    return $this->transaction_status;
  }

  /**
   * @param int $status
   * @return $this
   */
  protected function setTransactionStatus($status) {
    $this->transaction_status = (int) $status;
    return $this;
  }

  /**
   * @return string
   */
  public function getHostResponseMessage() {
    return $this->host_response_message;
  }

  /**
   * @param string $message
   * @return $this
   */
  protected function setHostResponseMessage($message) {
    $this->host_response_message = $message;
    return $this;
  }

  /**
   * @return int
   */
  public function getHostResponseCode() {
    return $this->host_response_code;
  }

  /**
   * @param int $code
   * @return $this
   */
  protected function setHostResponseCode($code) {
    $this->host_response_code = (int) $code;
    return $this;
  }

  /**
   * @return int
   */
  protected function getBatchNumber() {
    return $this->batch_number;
  }

  /**
   * @param int $number
   * @return $this
   */
  protected function setBatchNumber($number) {
    $this->batch_number = (int) $number;
    return $this;
  }

  /**
   * Used for TablePay only.
   * @return string
   */
  protected function getTransactionCode() {
    return $this->transaction_code;
  }

  /**
   * @param string $code
   * @return $this
   */
  protected function setTransactionCode($code) {
    $this->transaction_code = $code;
    return $this;
  }

  /**
   * @return string
   */
  public function getTerminalReference() {
    return $this->terminal_reference;
  }

  /**
   * @param string $reference
   * @return $this
   */
  protected function setTerminalReference($reference) {
    $this->terminal_reference = $reference;
    return $this;
  }

  /**
   * @return string
   */
  public function getTerminalId() {
    return $this->terminal_id;
  }

  /**
   * @param string $id
   * @return $this
   */
  protected function setTerminalId($id) {
    $this->terminal_id = $id;
    return $this;
  }

  /**
   * @return \DOMDocument
   */
  public function getDocument() {
    return $this->document;
  }
}
