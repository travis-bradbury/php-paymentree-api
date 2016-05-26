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
   * @var \Socket\Raw\Factory
   */
  protected $factory;

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

    $factory = Paymentree::get_socket_factory();

    $address = 'tcp://' . $this->host . ':' . $this->port;
    $socket = $factory->createClient($address);
    $socket->write($data);

    while ($data = $socket->recv(8192, NULL)) {
      $response .= $data;
      // If less than the requested length was returned, we're done reading.
      if (strlen($data) < 8192) {
        break;
      }
    }

    return $response;
  }
}
