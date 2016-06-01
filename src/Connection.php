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
   * @var string
   */
  protected $last_request;

  /**
   * @var string
   */
  protected $last_response;

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

    $this->setLastRequest($data);

    $factory = Paymentree::getSocketFactory();

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

    $this->setLastResponse($response);

    return $response;
  }

  /**
   * Get the raw data send in the last request.
   * @return string
   */
  public function getLastRequest() {
    return $this->last_request;
  }

  /**
   * @param string $request
   * @return $this
   */
  protected function setLastRequest($request) {
    $this->last_request = $request;
    return $this;
  }

  /**
   * Get the raw data received in the last request.
   * @return string
   */
  public function getLastResponse() {
    return $this->last_response;
  }

  /**
   * @param string $response
   * @return $this
   */
  protected function setLastResponse($response) {
    $this->last_response = $response;
    return $this;
  }
}
