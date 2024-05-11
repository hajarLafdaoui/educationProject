<?php

@include '1-config.php';

session_start();
session_unset();
session_destroy();

header('location: http://localhost/Education/Html/index.php');

?>
<!-- session_unset() It does not destroy the session itself, but only clears the data stored in the session variables. After calling session_unset(), the session variables are effectively empty, but the session itself still exists. -->

<!-- session_destroy() It destroys all of the data associated with the current session. deleting all session data stored on the server. It also removes the session cookie if it exists on the client side. After calling session_destroy(), the session is ended, and a new session must be started if needed. -->