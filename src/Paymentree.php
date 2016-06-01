<?php

namespace Paymentree;

use \DOMDocument;
use \DOMException;

class Paymentree {

  const DEFAULT_LOCAL_IP_ADDRESS = '127.0.0.1';
  const DEFAULT_PORT = 32000;

  const REQUEST_TYPE = '00';

  const ACTION_TYPE_PURCHASE = '00';
  const ACTION_TYPE_REFUND = '10';
  const ACTION_TYPE_VOID = '30';
  const ACTION_TYPE_COMMIT = '40';
  const ACTION_TYPE_QUERY_VOID = '22';
  const ACTION_TYPE_TERMINAL_CLOSE_LIST = '28';
  const ACTION_TYPE_TERMINAL_CLOSE = '51';

  const RESPONSE_TYPE_GENERIC = 'response';
  const RESPONSE_TYPE_DEBIT = 'debit';
  const RESPONSE_TYPE_CASH = 'cash';
  const RESPONSE_TYPE_GIFTCARD = 'giftcard';

  /**
   * @var \Socket\Raw\Factory
   */
  protected static $socket_factory;

  /**
   * @var \Paymentree\Connection
   */
  protected static $connection;

  /**
   * @var \Paymentree\TransactionInterface
   */
  protected static $last_transaction;

  /**
   * @var int
   * Helper for checking for the status code that means a transaction was
   * successful.
   * Eg: `if ($code === Paymentree::$RESPONSE_CODE_SUCCESSFUL) {`
   */
  const RESPONSE_CODE_SUCCESSFUL = 0;

  /**
   * @var array
   * Response codes from Paymentree.
   */
  const RESPONSE_CODES = [
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
  ];

  /**
   * Get the message for a response code.
   * @param $code
   * @return string
   */
  public static function responseCodeMessage($code) {
    $codes = self::RESPONSE_CODES;
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
  public static function isSuccessful($code) {
    return $code === self::RESPONSE_CODE_SUCCESSFUL;
  }

  /**
   * @param string $host
   *   A host name or IP address.
   * @param int $port
   * @return \Paymentree\Connection
   */
  public static function connect($host = NULL, $port = NULL) {
    if (!self::$connection) {
      if (!$host) {
        $host = self::DEFAULT_LOCAL_IP_ADDRESS;
      }

      if (!$port) {
        $port = self::DEFAULT_PORT;
      }

      self::$connection = new Connection($host, $port);
    }

    return self::$connection;
  }

  /**
   * @return \Socket\Raw|Factory
   */
  public static function getSocketFactory() {
    if (!self::$socket_factory) {
      self::$socket_factory = new \Socket\Raw\Factory();
    }

    return self::$socket_factory;
  }

  /**
   * Get the appropriate response class for a response.
   * @param \DOMDocument $response
   * @return string
   * The name of the class to use for the response.
   */
  public static function responseClass($response) {
    // Default to basic Response.
    $class = '\Paymentree\Response';

    $list = $response->getElementsByTagName('CardTypeUsed');

    if ($list->length) {
      $node = $list->item(0);
      switch ($node->nodeValue) {
        case 'DEBIT ACCOUNT':
          $class = '\Paymentree\DebitResponse';
          break;
        case 'GIFTCARD':
          // TODO not sure what correct case is here.
          $class = '\Paymentree\GiftcardResponse';
          break;
        case 'CASH':
          // TODO not sure what correct case is here.
          $class = '\Paymentree\CashResponse';
          break;
      }
    }

    return $class;
  }

  /**
   * Load an XML response into a Response object.
   * @param string $response
   * @return \Paymentree\ResponseInterface
   * @throws \DOMException
   */
  public static function loadResponse($response) {
    // loadXML reports an error if XML is not well formed. Handle the error by
    // throwing an exception.
    set_error_handler(function($errno, $errstr, $errfile, $errline) {
      if (strpos($errstr, 'DOMDocument')) {
        throw new \DOMException($errstr);
      }
      // Fall back on previous error handler.
      return false;
    });

    $document = new DOMDocument();
    try {
      $document->loadXML($response);
    } catch (DOMException $e) {
      // Don't let the custom error handler survive beyond this constructor.
      restore_error_handler();
      throw $e;
    }
    restore_error_handler();

    $class = self::responseClass($document);
    return new $class($document);
  }

  /**
   * Transform the Get Terminal List for Closing response into an array of
   * terminal ids.
   * Eg:
   * $message = new GetTerminalListTransaction()->send()->getResponseMessage;
   * `$ids = Paymentree::terminal_ids($message);`
   * @param string $message
   * @return array
   */
  public static function terminalIds($message) {
    return explode('^', $message);
  }

  /**
   * Get the raw data received in the last request.
   * @return string
   */
  public static function getLastRequest() {
    return self::$connection->getLastRequest();
  }

  /**
   * Get the raw data received in the last response.
   * @return string
   */
  public static function getLastResponse() {
    return self::$connection->getLastResponse();
  }

  /**
   * @param TransactionInterface $transaction
   */
  public static function setLastTransaction(TransactionInterface $transaction) {
    self::$last_transaction = $transaction;
  }

  /**
   * Get the type of the last transaction sent.
   * @return null|string
   */
  public static function lastTransactionType() {
    if (isset(self::$last_transaction)) {
      return self::$last_transaction->getType();
    }

    return NULL;
  }
}
