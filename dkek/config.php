<?php

if( empty(session_id()) && !headers_sent()){
    session_start();
}
$conn = mysqli_connect("localhost", "id20905170_mustafaadmin", "@@lifebook123M", "id20905170_alumee");
if (!$conn) {
    echo "Connection Failed";
}