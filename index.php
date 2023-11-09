<?php

declare(strict_types=1);

include 'Users.php';
include 'Posts.php';
include 'Todos.php';

$usersList = new Users();
//print_r($usersList->getUsersList());

$postList = new Posts();
//print_r($postList->getPostsList());
//print_r($postList->addPost('q','q',1));
//print_r($postList->updatePost('qqqqqqq','qqqqqqq',111111));
//print_r($postList->deletePost(1));

$todosList = new Todos();
//print_r($todosList->getTodosList());


//print_r($postList->addPost('qwe', 'qwe', 123213));