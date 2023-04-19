<?php
$page = "/";
$user = new User;
$group = new Group;
$article = new Article;
//all users
$users = $user->get_all_users();
$groups = $group->get_all_groups();
$articles = $article->get_all_articles();

// var_dump(count($users), count($groups), count($articles));
// die();

//chart
$sql = "SELECT groups.group_name, COUNT(*) AS num_users
        FROM `users`
        INNER JOIN groups ON users.group_id = groups.id
        GROUP BY groups.group_name";
$results = $user->get_users_by_any_sql($sql);

$labels = array();
$data = array();
foreach ($results as $row) {
    $labels[] = $row['group_name'];
    $data[] = $row['num_users'];
}
require 'views/index.php';