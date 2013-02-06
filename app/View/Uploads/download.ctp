<?php
header('Content-type: '.$upload['Upload']['type']);
header('Content-Disposition: attachment; filename="'.$upload['Upload']['name'].'"');
readfile($upload['Upload']['path']);
?>
