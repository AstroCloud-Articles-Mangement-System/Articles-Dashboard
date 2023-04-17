<?php
$page="groups";
$group = new Group;

// if(isset($_POST['searchOnGroup'])){
    var_dump($_POST);
    $allGroups = $group->filter_groups($_POST['searchOnGroup']);
// }else{
//     $allGroups = $group->get_all_groups();
// }
// require 'views/index.php';