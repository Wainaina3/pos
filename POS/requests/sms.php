<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 27/10/2015
 * Time: 18:36
 */

class sms{


    function sendsms(){
        include_once('smsGateway.php');
        $smsGateway = new SmsGateway('dwainaina3@gmail.com', 'panyaroot');
        $deviceID=14117;
        $to=$_REQUEST['phone'];
        $mine='0542614920';
        $spent=$_REQUEST['totalprice'];
        $msg='Dear customer, You purchased goods worth '.$spent.'. You will receive a 10% discount in the next purchase '.$to;
        $result=$smsGateway->sendMessageToNumber($to,$msg,$deviceID);

    }

}

$messenger=new sms();

if(isset($_REQUEST['cmd'])){

    $cmd=$_REQUEST['cmd'];

    switch ($cmd) {
        case 1:
            $messenger->sendsms();
            break;

        default:

            break;
    }
}

?>