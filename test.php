<?php
$roles = ["admin", "developer", "user"];
$role = "author";

$result = in_array($role, $roles, true);

echo $result."\n";