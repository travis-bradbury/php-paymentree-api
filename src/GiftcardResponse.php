<?php

namespace Paymentree;

class GiftcardResponse extends DebitGiftcardResponse {

  /**
   * @var int
   */
  protected $card_balance;

  /**
   * @var string
   */
  protected $card_exp_date;

  /**
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
}
