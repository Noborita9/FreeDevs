<?php
session_start();
session_unset();
header('Refresh: 2; URL = login.php');
