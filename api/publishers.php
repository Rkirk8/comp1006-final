<?php
header('Content-Type: application/json');

$sql = 'SELECT * FROM exampublishers';

$cmd = $db->prepare($sql);
$cmd->execute();
$publishers = $cmd->fetchAll();

echo json_encode($publishers);
?>
