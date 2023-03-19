<?php

function myEcho($param) {
    echo $param . "<br>";
}

myEcho("Sammy");

include 'ListOfMessages.php';

$ListeMsgs = new ListOfMessages ('Mon 1er Message');

myEcho($ListeMsgs->name());

myEcho($ListeMsgs->owner());

$nb_msg = $ListeMsgs->nbMsg('toto');
myEcho($nb_msg);

$ListeMsgs->addMsg("Msg to add");

$nb_msg = $ListeMsgs->nbMsg();
myEcho($nb_msg);

$ListeMsgs->addMsg("3rd Msg added");
$ListeMsgs->addMsg("4th Msg added");
$ListeMsgs->addMsg("5rd Msg added");
$ListeMsgs->addMsg("6th Msg added");

$nb_msg = $ListeMsgs->nbMsg();
myEcho($nb_msg);

$list = $ListeMsgs->listMsgs();
var_dump($list);
myEcho("END VARduMP");

$linesToDelete = [];
for ($i = 1; $i <= 2; $i++) {
    array_push($linesToDelete, $i);
}
array_push($linesToDelete, 4, 6, 9, 11);
$ListeMsgs->delMsg($ListeMsgs->Owner(), $linesToDelete);
myEcho("deleted Messages N° : 1, 2 and 4, 6, 9, 11");

$list_after_del = $ListeMsgs->listMsgs();
var_dump($list_after_del);
myEcho("");

$ListeMsgs->display("List-toDisplay");

$ListeMsgs->remove("List-toRemove");



?>