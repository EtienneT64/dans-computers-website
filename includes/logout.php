<?php
// Start or resume the session
session_start();

// Destroy the session
session_destroy();

header("Location: /src/account.php");
exit;
