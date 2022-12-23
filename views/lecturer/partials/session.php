<?php
session_start();
require_once(__DIR__.'/../../../lib/protect.php');
protect('lecturer');
?>