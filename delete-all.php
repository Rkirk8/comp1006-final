<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deleting Games...</title>
</head>
<body>
<?php
require 'include/auth.php';
require 'include/db.php';

$sql = "DELETE FROM examgames";
$cmd = $db->prepare($sql);
$cmd->execute();

$db = null;

header('location:games.php');
?>
</body>
</html>

