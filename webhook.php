<?php



session_start();

echo $email = $_SESSION['email'];
require 'assets/vendor/autoload.php';

$stripe = new \Stripe\StripeClient('sk_test_51Ml3wJGui44lwdb4hcY6Nr91bXfxAT2KVFXMxiV6ridW3LCMcB6aoV9ZAQxL3kDjaBphiAoga8ms0zbUiQjbZgzd00DpMxrLNL');

$endpoint_secret = 'whsec_78477c4b99a5a41c9ebf9a97d7a570bb12a519d4afea722c79ada23b72ba5eaa';

$payload = @file_get_contents('php://input');


$headers = getallheaders();
$sig_header = isset($headers['Stripe-Signature']) ? $headers['Stripe-Signature'] : null;
$event = null;

try {
  $event = \Stripe\Webhook::constructEvent(
    $payload, $sig_header, $endpoint_secret
  );
} catch (\UnexpectedValueException $e) {
  // Invalid payload
  http_response_code(400);
  exit();
} catch (\Stripe\Exception\SignatureVerificationException $e) {
  echo ($e);
  // Invalid signature
  http_response_code(400);
  exit();
}

// Handle the event
$triggeredEvent = '';
$paymentIntentMethod = '';

switch ($event->type) {
  case 'payment_intent.created':
    $paymentIntent = $event->data->object;
    file_put_contents('helloworldcreated.txt', $email);
    $triggeredEvent = 'payment_intent.created';
    $paymentIntentMethod = $paymentIntent->payment_method;
    break;

  case 'payment_intent.succeeded':
    $paymentIntent = $event->data->object;
    file_put_contents('helloworldsucceeded.txt', $email);
    $triggeredEvent = 'payment_intent.succeeded';
    $paymentIntentMethod = $paymentIntent->payment_method;
    break;

  case 'payment_intent.failed':
    $paymentIntent = $event->data->object;
    file_put_contents('helloworldfailed.txt', $email);
    $triggeredEvent = 'payment_intent.failed';
    $paymentIntentMethod = $paymentIntent->payment_method;
    break;

  case 'payment_intent.canceled':
    $paymentIntent = $event->data->object;
    file_put_contents('helloworldcanceled.txt', $email);
    $triggeredEvent = 'payment_intent.canceled';
    $paymentIntentMethod = $paymentIntent->payment_method;
    break;

  case 'payment_intent.requires_payment_method':
    $paymentIntent = $event->data->object;
    file_put_contents('helloworldrequires_payment_method.txt', $email);
    $triggeredEvent = 'payment_intent.requires_payment_method';
    $paymentIntentMethod = $paymentIntent->payment_method;
    break;

  case 'payment_intent.requires_confirmation':
    $paymentIntent = $event->data->object;
    file_put_contents('helloworldrequires_confirmation.txt', $email);
    $triggeredEvent = 'payment_intent.requires_confirmation';
    $paymentIntentMethod = $paymentIntent->payment_method;
    break;

  case 'payment_intent.processing':
    $paymentIntent = $event->data->object;
    file_put_contents('helloworldprocessing.txt', $email);
    $triggeredEvent = 'payment_intent.processing';
    $paymentIntentMethod = $paymentIntent->payment_method;
    break;

  default:
    echo 'Received unknown event type ' . $event->type;
}
print_r($paymentIntent);

http_response_code(200);

// Echo the triggered event and payment intent method
echo 'Triggered Event: ' . $triggeredEvent . '<br>';
echo 'Payment Intent Method: ' . $paymentIntentMethod;
?>
