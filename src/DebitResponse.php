<?php

namespace Paymentree;

class DebitResponse extends DebitGiftcardResponse {

  /**
   * @var string
   */
  protected $invoice_number;

  /**
   * @var int
   */
  protected $tip_amount;

  /**
   * @var string
   */
  protected $signature;

  /**
   * @var string
   * The type of image.
   */
  protected $mime_type;

  /**
   * @var string
   */
  protected $emv_name;

  /**
   * @var string
   */
  protected $emv_aid;

  /**
   * @var string
   */
  protected $emv_tvr;

  /**
   * @var string
   */
  protected $emv_tsi;

  /**
   * @var string
   */
  protected $trace;

  /**
   * @var string
   */
  protected $mendorse;

  /**
   * @var string
   */
  protected $cendorse;

  /**
   * @var string
   */
  protected $header;

  /**
   * @var string
   */
  protected $footer;

  /**
   * @var string
   */
  protected $account;

  /**
   * @var string
   */
  protected $token;

  /**
   * @var string
   */
  protected $token_exp;

  public function __construct($response) {
    parent::__construct($response);
    $this->type = Paymentree::RESPONSE_TYPE_DEBIT;

    if ($number = $this->getDocumentContent('InvoiceNumber')) {
      $this->setInvoiceNumber($number);
    }

    if ($amount = $this->getDocumentContent('TipAmt')) {
      $this->setTipAmount($amount);
    }

    if ($signature = $this->getDocumentContent('Signature')) {
      $this->setSignature($signature);
    }

    if ($type = $this->getDocumentContent('MimeType')) {
      $this->setMimeType($type);
    }

    if ($name = $this->getDocumentContent('EmvName')) {
      $this->setEmvName($name);
    }

    if ($aid = $this->getDocumentContent('EmvAid')) {
      $this->setEmvAid($aid);
    }

    if ($tvr = $this->getDocumentContent('EmvTvr')) {
      $this->setEmvTvr($tvr);
    }

    if ($tsi = $this->getDocumentContent('EmvTsi')) {
      $this->setEmvTsi($tsi);
    }

    if ($number = $this->getDocumentContent('Trace')) {
      $this->setTrace($number);
    }

    if ($endorsement = $this->getDocumentContent('MEndorse')) {
      $this->setMEndorse($endorsement);
    }

    if ($endorsement = $this->getDocumentContent('CEndorse')) {
      $this->setCEndorse($endorsement);
    }

    if ($header = $this->getDocumentContent('Header')) {
      $this->setHeader($header);
    }

    if ($footer = $this->getDocumentContent('Footer')) {
      $this->setFooter($footer);
    }

    if ($account = $this->getDocumentContent('Account')) {
      $this->setAccount($account);
    }

    if ($header = $this->getDocumentContent('Header')) {
      $this->setHeader($header);
    }

    if ($header = $this->getDocumentContent('Header')) {
      $this->setHeader($header);
    }

    if ($token = $this->getDocumentContent('Token')) {
      $this->setToken($token);
    }

    if ($expiry = $this->getDocumentContent('TokenExp')) {
      $this->setTokenExpiry($expiry);
    }
  }

  /**
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
   * @param $data
   * @return $this
   */
  protected function setEmvTsi($data) {
    $this->emv_tsi = $data;
    return $this;
  }

  /**
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

}
