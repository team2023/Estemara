<?php

if( empty(session_id()) && !headers_sent()){
    session_start();
}
$conn = mysqli_connect("localhost", "root", "", "alument");
if (!$conn) {
    echo "Connection Failed";
}