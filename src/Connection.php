<?php

namespace Paymentree;

class Connection {

  /**
   * @var string
   *   The ip address or host name to connect to.
   */
  protected $host;

  /**
   * @var int
   *   The port to connect to.
   */
  protected $port;

  /**
   * Connection constructor.
   * @param string $host
   * @param int $port
   */
  public function __construct($host, $port) {
    $this->host = $host;
    $this->port = $port;
  }

  /**
   * @param string $data
   * @return string
   * @throws \Exception
   */
  public function send($data = '') {
    $response = '';

    $data = '<TRANS><PAYLinqTransId>1520913221307</PAYLinqTransId><CheckNo>4717</CheckNo></TRANS>';
    $errno = NULL;
    $errstr = NULL;
    if ($resource = stream_socket_client('tcp://' . $this->host . ':' . $this->port, $errno, $errstr)) {
      fwrite($resource, $data);
      $response = fgets($resource);
      fclose($resource);
    }

    if (!empty($errno) || !empty($errstr)) {
      throw new \Exception($errno . ': ' . $errstr);
    }

    return $response;
  }
}
