<?php
#############################################################
## iDevAffiliate Version 9.2
## Copyright - iDevAffiliate Inc.
## Website: https://www.idevdirect.com/
## Support: https://www.idevsupport.com/
#############################################################

include("../API/config.php");

//mail('mail@mail.com', 'Chargebee Testing', print_r($_REQUEST, true) . print_r($_SERVER, true));


//now do chargify task here
require '../API/chargebee/lib/ChargeBee.php';
$webhook_request = file_get_contents('php://input');
//$event = ChargeBee_Event::deserialize($webhook_request);
//$eventType = $event->eventType;  // to get the event type
//$content = $event->content();

try {
    $event = ChargeBee_Event::deserialize($webhook_request);
    $eventType = $event->eventType;  // to get the event type

    //mail('mail@mail.com', 'Chargebee TESTING: idevtest.com/ninetwo', print_r($event, true));

    if ($eventType === 'payment_succeeded') {
        $content = $event->content();

        $url = $base_url . '/sale.php';
        $profile = '120';

        //get amount and order id
        $idev_saleamt = 0;
        if (isset($content->transaction()->amount))
            $idev_saleamt = $content->transaction()->amount / 100;

        $idev_ordernum = '';
        if (isset($content->transaction()->id))
            $idev_ordernum = $content->transaction()->id;

        //get ip address
        $ip = '';
        if (isset($content->customer()->createdFromIp))
            $ip = $content->customer()->createdFromIp;

        //get coupon
        $coupon_code = "";
        if (is_array($content->subscription()->coupons) && count($content->subscription()->coupons) > 1) {
            foreach ($content->subscription()->coupons as $coupon_data):
                $coupon_code .= $coupon_data->couponId . ' ';
            endforeach;
        } else {
            if (isset($content->subscription()->coupon))
                $coupon_code = $content->subscription()->coupon;
        }

        $data = array(
            "profile" => $profile,
            "idev_saleamt" => $idev_saleamt,
            "idev_ordernum" => $idev_ordernum,
            "coupon_code" => $coupon_code,
            'ip_address' => $ip,
            'idev_secret' => $secret
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $json = curl_exec($ch);
        curl_close($ch);

        //mail('mail@mail.com','Chargebee Request '. $_POST['event'],  print_r($data,true));
        //we need to send http status code 200 to confirm that webhook call is succeed
        //https://apidocs.chargebee.com/docs/api/events
        header('X-PHP-Response-Code: 200', true, 200);
        die();
    } else {
        //mail('mail@mail.com','Chargify Request','200');
        //header('X-PHP-Response-Code: 400', true, 400);
        //die('Invalid Webhook ' . $eventType);
        //we are good here, because we are only handling payment_succeeded webhook
        //if we don't send 200 ok, chargebee will send data to this link again
        header('X-PHP-Response-Code: 200', true, 200);
        die();
    }
} catch (Exception $e) {
    //mail('mail@mail.com','Chargify Request','400');
    header('X-PHP-Response-Code: 400', true, 400);
    echo $e->getMessage();
    die;
}
exit;
