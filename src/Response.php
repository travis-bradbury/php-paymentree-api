<?php

namespace Paymentree;

class Response {

  //
  // Variables to store the values from the response.
  //

  /**
   * @var string
   * Applies to Debit, Cash, and Giftcard transactions.
   */
  protected $pay_linq_trans_id;

  /**
   * @var string
   * Applies to Debit, Cash, and Giftcard transactions.
   * Used for TablePay only.
   */
  protected $check_no;

  /**
   * @var int
   * Applies to Debit, Cash, and Giftcard transactions.
   */
  protected $trans_resp_code;

  /**
   * @var string
   * Applies to Debit, Cash, and Giftcard transactions.
   */
  protected $trans_resp_msg;

  /**
   * @var string
   * Applies to Debit and Giftcard transactions.
   */
  protected $card_no;

  /**
   * @var string
   * Applies to Debit, Cash, and Giftcard transactions.
   */
  protected $card_type_used;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $invoice_number;

  /**
   * @var string
   * Applies to Debit and Giftcard transactions.
   */
  protected $provider_trans_id;

  /**
   * @var int
   * Applies to Giftcard transactions.
   */
  protected $card_balance;

  /**
   * @var string
   * Applies to Giftcard transactions.
   */
  protected $card_exp_date;

  /**
   * @var int
   * Applies to Debit, Cash, and Giftcard transactions.
   */
  protected $processed_amount;

  /**
   * @var string
   * Applies to Debit and Giftcard transactions.
   */
  protected $card_entry_mode;

  /**
   * @var string
   * Applies to Debit, Cash, and Giftcard transactions.
   */
  protected $card_code;

  /**
   * @var string
   * Applies to Debit, Cash, and Giftcard transactions.
   */
  protected $merchant_receipt;

  /**
   * @var string
   * Applies to Debit, Cash, and Giftcard transactions.
   */
  protected $customer_receipt;

  /**
   * @var int
   * Applies to Debit transactions.
   */
  protected $tip_amount;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $signature;

  /**
   * @var string
   * The type of image.
   * Applies to Debit transactions.
   */
  protected $mime_type;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $emv_name;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $emv_aid;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $emv_tvr;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $emv_tsi;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $trace;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $mendorse;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $cendorse;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $header;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $footer;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $account;

  /**
   * @var string
   * Applies to Debit and Giftcard transactions.
   */
  protected $cust_lang;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $token;

  /**
   * @var string
   * Applies to Debit transactions.
   */
  protected $token_exp;

  /**
   * @var string
   * Used for TablePay only.
   * Applies to Debit, Cash, and Giftcard transactions.
   */
  protected $transaction_code;

  /**
   * Response constructor.
   * @param $response
   */
  public function __construct($response) {
  }

  //
  // Getters and setters for response values.
  //

  /**
   * Applies to Debit, Cash, and Giftcard transactions.
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
   * Applies to Debit, Cash, and Giftcard transactions.
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
   * Applies to Debit, Cash, and Giftcard transactions.
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
   * Applies to Debit, Cash, and Giftcard transactions.
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
   * Applies to Debit, Cash, and Giftcard transactions.
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
   * Applies to Debit and Giftcard transactions.
   * @return string
   */
  public function getCardNumber() {
    return $this->card_no;
  }

  /**
   * @param $number
   * @return $this
   */
  protected function setCardNumber($number) {
    $this->card_no = $number;
    return $this;
  }

  /**
   * Applies to Debit, Cash, and Giftcard transactions.
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
   * Applies to Debit transactions.
   * @return string
   */
  public function getInvoiceNumber() {
    return $this->invoice_number;
  }

  /**
   * @param $number
   * @return $this
   */
  protected function setInvoiceNumber($number) {
    $this->invoice_number = $number;
    return $this;
  }

  /**
   * Applies to Debit and Giftcard transactions.
   * @return string
   */
  public function getProviderTransactionId() {
    return $this->provider_trans_id;
  }

  /**
   * @param $id
   * @return $this
   */
  protected function setProviderTransactionId($id) {
    $this->provider_trans_id = $id;
    return $this;
  }

  /**
   * Applies to Giftcard transactions.
   * @return string
   */
  public function getCardBalance() {
    return $this->card_balance;
  }

  /**
   * @param $balance
   * @return $this
   */
  protected function setCardBalance($balance) {
    $this->card_balance = $balance;
    return $this;
  }

  /**
   * Applies to Giftcard transactions.
   * @return string
   */
  public function getCardExpiryDate() {
    return $this->card_exp_date;
  }

  /**
   * TODO: make a date object or no?
   * @param string $date
   * Formatted "MMYY".
   * @return $this
   */
  protected function setCardExpiryDate($date) {
    $this->card_exp_date = $date;
    return $this;
  }

  /**
   * Applies to Debit, Cash, and Giftcard transactions.
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
   * Applies to Debit and Giftcard transactions.
   * @return string
   */
  public function getCardEntryMode() {
    return $this->card_entry_mode;
  }

  /**
   * @param $mode
   * @return $this
   */
  protected function setCardEntryMode($mode) {
    $this->card_entry_mode = $mode;
    return $this;
  }

  /**
   * Applies to Debit, Cash, and Giftcard transactions.
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
   * Applies to Debit, Cash, and Giftcard transactions.
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
   * Applies to Debit, Cash, and Giftcard transactions.
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
   * Applies to Debit transactions.
   * @return string
   */
  public function getTipAmount() {
    return $this->tip_amount;
  }

  /**
   * @param $amount
   * @return $this
   */
  protected function setTipAmount($amount) {
    $this->tip_amount = $amount;
    return $this;
  }

  /**
   * Applies to Debit transactions.
   * @return string
   */
  public function getSignature() {
    return $this->signature;
  }

  /**
   * @param $signature
   * @return $this
   */
  protected function setSignature($signature) {
    $this->signature = $signature;
    return $this;
  }

  /**
   * Applies to Debit transactions.
   * @return string
   */
  public function getMimeType() {
    return $this->mime_type;
  }

  /**
   * @param $type
   * @return $this
   */
  protected function setMimeType($type) {
    $this->mime_type = $type;
    return $this;
  }

  /**
   * Applies to Debit transactions.
   * @return string
   */
  public function getEmvName() {
    return $this->emv_name;
  }

  /**
   * @param $name
   * @return $this
   */
  protected function setEmvName($name) {
    $this->emv_name = $name;
    return $this;
  }

  /**
   * Applies to Debit transactions.
   * @return string
   */
  public function getEmvAid() {
    return $this->emv_aid;
  }

  /**
   * @param $data
   * @return $this
   */
  protected function setEmvAid($data) {
    $this->emv_aid = $data;
    return $this;
  }

  /**
   * Applies to Debit transactions.
   * @return string
   */
  public function getEmvTvr() {
    return $this->emv_tvr;
  }

  /**
   * @param $data
   * @return $this
   */
  protected function setEmvTvr($data) {
    $this->emv_tvr = $data;
    return $this;
  }

  /**
   * @return string
   */
  public function getEmvTsi() {
    return $this->emv_tsi;
  }

  /**
   * Applies to Debit transactions.
   * @param $data
   * @return $this
   */
  protected function setEmvTsi($data) {
    $this->emv_tsi = $data;
    return $this;
  }

  /**
   * Applies to Debit transactions.
   * @return string
   */
  public function getTrace() {
    return $this->trace;
  }

  /**
   * @param $number
   * @return $this
   */
  protected function setTrace($number) {
    $this->trace = $number;
    return $this;
  }

  /**
   * Applies to Debit transactions.
   * @return string
   */
  public function getMEndorse() {
    return $this->mendorse;
  }

  /**
   * @param $endorsement
   * @return $this
   */
  protected function setMEndorse($endorsement) {
    $this->mendorse = $endorsement;
    return $this;
  }

  /**
   * Applies to Debit transactions.
   * @return string
   */
  public function getCEndorse() {
    return $this->cendorse;
  }

  /**
   * @param $endorsement
   * @return $this
   */
  protected function setCEndorse($endorsement) {
    $this->cendorse = $endorsement;
    return $this;
  }

  /**
   * Applies to Debit transactions.
   * @return string
   */
  public function getHeader() {
    return $this->header;
  }

  /**
   * @param $header
   * @return $this
   */
  protected function setHeader($header) {
    $this->header = $header;
    return $this;
  }

  /**
   * Applies to Debit transactions.
   * @return string
   */
  public function getFooter() {
    return $this->footer;
  }

  /**
   * @param $footer
   * @return $this
   */
  protected function setFooter($footer) {
    $this->footer = $footer;
    return $this;
  }

  /**
   * Applies to Debit transactions.
   * @return string
   */
  public function getAccount() {
    return $this->account;
  }

  /**
   * @param $value
   * @return $this
   */
  protected function setAccount($value) {
    $this->account = $value;
    return $this;
  }

  /**
   * Applies to Debit and Giftcard transactions.
   * @return string
   */
  public function getCustomerLanguage() {
    return $this->cust_lang;
  }

  /**
   * @param $language
   * @return $this
   */
  protected function setCustomerLanguage($language) {
    $this->cust_lang = $language;
    return $this;
  }

  /**
   * Applies to Debit transactions.
   * @return string
   */
  public function getToken() {
    return $this->token;
  }

  /**
   * @param $token
   * @return $this
   */
  protected function setToken($token) {
    $this->token = $token;
    return $this;
  }

  /**
   * Applies to Debit transactions.
   * @return string
   */
  public function getTokenExpiry() {
    return $this->token_exp;
  }

  /**
   * @param string $date
   * Formatted "MMYY".
   * @return $this
   */
  protected function setTokenExpiry($date) {
    $this->token_exp = $date;
    return $this;
  }

  /**
   * Applies to Debit, Cash, and Giftacard transactions.
   * Used for TablePay only.
   * @return string
   */
  public function getTransactionCode() {
    return $this->token_exp;
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
