<?php
$page="groups";
$group = new Group;
try {
    if(isset($_POST['searchOnGroup']) && !empty(($_POST['searchOnGroup']))){
        $allGroups = $group->filter_groups($_POST['searchOnGroup']);
    }else{
        $allGroups = Group::get_all_groups();
    }
    require 'views/index.php';
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());
}
