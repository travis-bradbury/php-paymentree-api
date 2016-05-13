<?php

namespace Paymentree;

use \DOMDocument;
use \DOMException;

class Response {

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
   * Used for TablePay only.
   */
  protected $transaction_code;

  /**
   * @var \DOMDocument
   * A DOMDocument object representing the response.
   */
  protected $document;

  /**
   * Response constructor.
   * @param $response
   * @throws \DOMException
   */
  public function __construct($response) {
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
   * @return \Paymentree\Response
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
    $this->pay_linq_trans_id = $id;
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
   * @param $amount
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
   * Used for TablePay only.
   * @return string
   */
  public function getTransactionCode() {
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
}
