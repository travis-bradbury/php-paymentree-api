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
}
