<?php 

interface NotificationInterface {
    function send($message);
    function writeOnDatabase($dbh, $message);
}

class Notification implements NotificationInterface {

    public function send($message){
        echo "Mail : ".date('Y-m-d H:i:s')." : ".$message."<br>";
    }

    public function writeOnDatabase($dbh, $message){
        echo "Write on database -> Mail sended at ".date('Y-m-d H:i:s')." : ".$message."<br>";
    }

}


abstract class NotifDecorator implements NotificationInterface{

    protected $notification;

    public function __construct(NotificationInterface $notif){
        $this->notification = $notif;
    }

    public function send($message){
        $this->notification->send($message);
    }

    public function writeOnDatabase($dbh, $message){
        $this->notification->writeOnDatabase($dbh, $message);
    }

}

class NotificationTelegram extends NotifDecorator {

    public function __construct($notif){
        parent::__construct($notif);
    }

    public function send($message){
        parent::send($message);
        echo "Telegram : ".date('Y-m-d H:i:s')." : ".$message."<br>";
    }

    public function writeOnDatabase($dbh, $message){
        echo "Write on database -> Telegram message sended at ".date('Y-m-d H:i:s')." : ".$message."<br>";
        parent::writeOnDatabase($dbh, $message);
    }

}

class NotificationSms extends NotifDecorator {

    public function __construct($notif){
        parent::__construct($notif);
    }

    public function send($message){
        parent::send($message);
        echo "SMS : ".date('Y-m-d H:i:s')." : ".$message."<br>";
    }

    public function writeOnDatabase($dbh, $message){
        echo "Write on database -> SMS sended at ".date('Y-m-d H:i:s')." : ".$message."<br>";
        parent::writeOnDatabase($dbh, $message);
    }

}


$messageNotif = "Tentative de connexion dépassé";
$notification = new NotificationTelegram( new Notification() );
$notification->send($messageNotif);
echo "<br>";

$messageNotif = "Connexion réussi";
$notification = new NotificationSms( $notification );
$notification->send($messageNotif);
$notification->writeOnDatabase(null, $messageNotif);
echo "<br>";
?>