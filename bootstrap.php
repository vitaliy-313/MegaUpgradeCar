<?php
session_start();

include $_SERVER["DOCUMENT_ROOT"] ."/app/config/db.php";
include $_SERVER["DOCUMENT_ROOT"] ."/app/helpers/Connection.php";

include $_SERVER["DOCUMENT_ROOT"] ."/app/models/Basket.php";
include $_SERVER["DOCUMENT_ROOT"] ."/app/models/Order.php";
include $_SERVER["DOCUMENT_ROOT"] ."/app/models/User.php";
include $_SERVER["DOCUMENT_ROOT"] ."/app/models/Product.php";