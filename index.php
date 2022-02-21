<?php
require_once 'class/Message.php';
require_once 'class/GuestBook.php';
$guestbook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'messages');
if (isset($_POST['title'], $_POST['message'])) {
    $message = new Message($_POST['title'], $_POST['message']);
        $guestbook->addMessage($message);
        $_POST = [];
    }
   
$messages = $guestbook->getMessages();
$title = "Le blog";
require 'elements/header.php'; 
?>
   
<div class="container">
    <h1>Mon blog</h1>
  
     
    <?php if (!empty($messages)): ?>
    <h1 class="mt-4">Les articles</h1>

    <?php foreach($messages as $message): ?>
        <?= $message->toHTML() ?>
    <?php endforeach ?>

    <?php endif ?>
</div>
