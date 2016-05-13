<?php

namespace Paymentree;

class Connection {

  /**
   * Connection constructor.
   * @param string $ip_address
   * @param int $port
   */
  public function __construct($ip_address, $port) {

  }

  /**
   * @param string $data
   * @return string
   */
  public function send($data) {
    return '<TRANS><PAYLinqTransId>1520913221307</PAYLinqTransId><CheckNo>4717</CheckNo></TRANS>';
  }
}
