<?php

namespace Paymentree;

class Paymentree {
  /**
   * @var string
   */
  public static $DEFAULT_LOCAL_IP_ADDRESS = '127.0.0.1';

  /**
   * @var int
   */
  public static $DEFAULT_PORT = 320000;

  /**
   * @var int
   */
  public static $REQUEST_TYPE = 00;

  /**
   * @var int
   */
  public static $ACTION_TYPE_PURCHASE = 00;

  /**
   * @var int
   */
  public static $ACTION_TYPE_REFUND = 10;

  /**
   * @var int
   */
  public static $ACTION_TYPE_VOID = 30;

  /**
   * @var int
   */
  public static $ACTION_TYPE_COMMIT = 40;

  /**
   * @var int
   */
  public static $ACTION_TYPE_QUERY_VOID = 22;

  /**
   * @var int
   */
  public static $ACTION_TYPE_TERMINAL_CLOSE_LIST = 28;

  /**
   * @var int
   */
  public static $ACTION_TYPE_TERMINAL_CLOSE = 51;

  /**
   * @var int
   * Helper for checking for the status code that means a transaction was
   * successful.
   * Eg: `if ($code === Paymentree::$RESPONSE_CODE_SUCCESSFUL) {`
   */
  public static $RESPONSE_CODE_SUCCESSFUL = 0;

  /**
   * @var array
   * Response codes from Paymentree.
   */
  protected static $response_codes = array(
    0 => "Action Successful",
    1 => "Message Format is Invalid",
    2 => "Request Type Not Supported",
    3 => "Amount Invalid",
    4 => "Action not supported for this Type;",
    5 => "Provider Generic Error; unknown Provider error",
    6 => "Provider Not Supported; Unknown provider code passed in request",
    7 => "Missing Data Request; Required data for the request is missing",
    8 => "Missing Provider Client ID; The Identifier to this provider is not setup",
    9 => "Process Timed Out; Time out waiting for provider",
    10 => "Terminal Parameter Not Setup, Credit/Debit Pinpad not setup",
    11 => "Generic Error, an undefined error occurred",
    12 => "Transaction Missing, Invalid Paymentree number sent with CommitTrans",
    13 => "Can't process current transaction because previous transactions were not committed",
    14 => "Invalid request transaction ID. ID must be a number",
    15 => "Calling void with an invalid amount",
    16 => "The original transaction to void has no amount",
    17 => "Cannot reverse previous time out transaction for same card",
    18 => "Can't process current transaction because previous transaction(s) was not committed",
    19 => "Invalid request transaction ID. Must be a number",
    20 => "Posting transaction does not match any transaction",
    21 => "Cannot perform another transaction for card that is in uncommitted transaction",
    22 => "Action is not supported for a remote request",
    23 => "There is no posting transaction to post to. Please cancel the posting mode",
    25 => "Terminal not set up",
    26 => "Credit/Debit provider not setup",
    27 => "There are no tables available for check out",
    28 => "All terminals are currently used",
    30 => "There is no terminal with an open batch",
    31 => "Duplicate receipt #",
    101 => "Invalid identification to host",
    102 => "Card is not valid",
    103 => "Return is being performed on a card that was not used in the original transaction",
    104 => "Timed out waiting for provider processor. Reversal transaction will be sent by Paymentree (Gift/Loyalty card only)",
    105 => "Amount requested is below minimum allowed amount",
    106 => "Amount requested is greater than the allowed maximum",
    107 => "Invalid amount",
    108 => "The incorrect amount is being passed for this void transaction",
    109 => "Duplicate transaction",
    110 => "Transaction is too old to cancel",
    111 => "Cancel not allowed",
    112 => "Certificate on hold",
    113 => "Amount exceeds balance limit",
    114 => "Insufficient funds",
    115 => "Invalid transaction",
    199 => "Requesting activation of an already active card.",
    200 => "Certificate closed",
    201 => "Certificate expired",
    202 => "Certificate cancelled",
    203 => "Certificate is cancelled due to fraud",
    204 => "Certificate can only be used after a future date",
    205 => "Invalid Security Code",
    206 => "Currency conversion is not allowed",
    207 => "Not Used",
    208 => "Cert is already registered",
    209 => "Cert expired with amount left on card",
    210 => "Card was activated at a different location",
    211 => "Activating a gift card again is not allowed",
    212 => "Could not perform increment transaction",
    213 => "Card is not registered",
    214 => "Provider setup error",
    300 => "User canceled during Pinpad operation",
    301 => "Current transaction is rejected because the device is still waiting for a previous transaction response",
    302 => "Device is not able to communication with firmware application",
    303 => "Declined",
    304 => "Communication Error",
    305 => "Timed out during User Input",
    306 => "Transaction not completed",
    307 => "Transaction not completed. Card was removed prior to connection to the host was established.",
    308 => "Chip malfunction occurred during communication with the card",
    309 => "Chip malfunction",
    310 => "Transaction is not supported",
    311 => "Transaction is not allowed",
    312 => "This card has been blocked. Cardholder needs to supply a new card",
    313 => "Refund limit exceeded for the card type",
    314 => "The payment terminal is not responding",
    999 => "Transaction Request Qualifies as a Duplicate",
  );

  /**
   * Get the message for a response code.
   * @param $code
   * @return string
   */
  public static function response_code_message($code) {
    $codes = self::$response_codes;
    if (isset($codes[$code])) {
      return $codes[$code];
    }
    else {
      return "Unknown";
    }
  }

  /**
   * Determines if a response code is for a successful transaction.
   * @param $code
   * @return bool
   */
  public static function is_successful($code) {
    return $code === self::$RESPONSE_CODE_SUCCESSFUL;
  }
}
