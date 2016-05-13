<?php

namespace Paymentree;

abstract class DebitGiftcardResponse extends Response {

  /**
   * @var string
   */
  protected $card_no;

  /**
   * @var string
   */
  protected $provider_trans_id;

  /**
   * @var string
   */
  protected $card_entry_mode;

  /**
   * @var string
   */
  protected $cust_lang;

  /**
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

}
