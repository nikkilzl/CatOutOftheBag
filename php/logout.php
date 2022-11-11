<?php
session_start();
//destroy all of the data associated with the current session
//in tutorial it unsets some variables first but since there are a lot of variables to handle, i think we can just destroy the whole session to clear everything
session_destroy();

header('Location: ../index.php');
?>
