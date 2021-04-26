<?php
session_start(); /* First we must start the session */
session_destroy(); /* Destroy started session */

header("location:index.php");  /* Redirect to index page */
exit;
