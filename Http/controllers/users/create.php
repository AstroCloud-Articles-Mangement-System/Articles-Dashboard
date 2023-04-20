<?php
$page = "user_create";
try {
    $allGroups = Group::get_all_groups();
    require 'views/index.php';
} catch (\Throwable $th) {
    write_to_log_file($th->getMessage(), $th->getFile(), $th->getLine());

}
