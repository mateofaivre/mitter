<?php 

abstract class Mediator{
    abstract public function sendMessage($message, $user);
}

class ChatMediator extends Mediator{
    public $users = [];

    public function join($user){
        if (!in_array($user, $this->users)) {
            $this->users[] = $user;
            echo '<span style="color:green">'.$user->name . ' à rejoint le channel<br></span>';
        }
    }

    public function disconnect($user){
        $pos = array_search($user, $this->users);
        if($pos){
            unset($this->users[$pos]);
            echo '<span style="color:red">'.$user->name . ' à s\'est déconnecté<br></span>';
        }
    }

    public function sendMessage($message, $user){
        echo '<span style="color:blue">'.$user->name.' a écrit '.$message.'<br></span>';
        foreach ($this->users as $u) {
            if ($u != $user) {
                $u->notify($message);
            }
        }
    }
}

abstract class User{
    public $mediator;
    public $name;

    public function __construct($mediator, $name){
        $this->mediator = $mediator;
        $this->name = $name;
    }
}

class ChatUser extends User{

    public function send($message){
        $this->mediator->sendMessage($message, $this);
    }

    public function notify($message){
        echo $this->name . ' reçois ：' . $message . '<br>';
    }

}

$m = new ChatMediator();

$u1 = new ChatUser($m, 'User1');
$u2 = new ChatUser($m, 'User2');
$u3 = new ChatUser($m, 'User3');

$m->join($u1);
$m->join($u2);

$u1->send('Bonjour à tous ');

$m->join($u3);

$u2->send('Coucou');

$m->disconnect($u2);

$u3->send('Salut');

?>