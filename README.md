# php-paymentree-api

Here's an example of what this might look like.

```php
// Optional; otherwise connects on default 127.0.0.1:32000.
Paymentree::connect('192.168.10.154', 80);

$transaction = new PaymentTransaction();
$transaction->setAmount(500);
/** @var \Paymentree\DebitResponse */
$response = $transaction->send();

$transaction_id = $response->getPayLinqTransactionId();
```
