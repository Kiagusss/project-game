<?php
session_start();

$conn = mysqli_connect("localhost",'root','','project_akhir');
if (!$conn) {
    die("Connection Failed :-".mysqli_connect_error());
}