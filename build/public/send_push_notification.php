<?php
require __DIR__ . '/../vendor/autoload.php';

use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

// here I'll get the subscription endpoint in the POST parameters
// but in reality, you'll get this information in your database
// because you already stored it (cf. push_subscription.php)
//$data = '{"endpoint":"https://fcm.googleapis.com/fcm/send/flTqd08y1NU:APA91bEsAG4mIsFmWxy6gVZ01FBt6g8wVn7IpgANYaoLZHWIC3ZvXAokUXuH1eQk9U99NUz4Z2YJ6WzzF6-1xsVCb5idhZ_oNpGvPTeA_4j45rMK63oXbTsQVYwpVmfOLy02KMWPxsYZ","expirationTime":null,"keys":{"p256dh":"BJMKV42QOTTkrXZAvferOKqIMu+Tkzf3NiJP5i5s8M8QLLURyl0fbMLBAcCJBCrZpl1pyH0NEVDp+9btlCImyKs=","auth":"MSrWqKcoI7l5G0q0lB4nkA=="},"contentEncoding":"aes128gcm"}';
if(isset(json_decode(file_get_contents('php://input'), true)["query"])) {
    $subscription = Subscription::create(json_decode(file_get_contents('php://input'), true)["query"]);
    $tables = json_decode(file_get_contents('php://input'), true)["table"];
}
else {
    $subscription = Subscription::create(json_decode(file_get_contents('php://input'), true));
    $tables = "";
}

$auth = array(
    'VAPID' => array(
        'subject' => 'https://github.com/Minishlink/web-push-php-example/',
        'publicKey' => file_get_contents('keys/public_key.txt'), // don't forget that your public key also lives in app.js
        'privateKey' => file_get_contents('keys/private_key.txt'), // in the real world, this would be in a secret file
    ),
);

$webPush = new WebPush($auth);

$report = $webPush->sendOneNotification(
    $subscription,
    "Заказ на стол: ".$tables
);

// handle eventual errors here, and remove the subscription from your server if it is expired
$endpoint = $report->getRequest()->getUri()->__toString();

if ($report->isSuccess()) {
    echo "[v] Message sent successfully for subscription {$endpoint}.";
} else {
    echo "[x] Message failed to sent for subscription {$endpoint}: {$report->getReason()}";
}
