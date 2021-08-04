<?php
function connect()
{
    try {
        $connection = new mysqli("localhost", "tusar33", "12345678", "digital-wallet");
        return $connection;
    } catch (Exception $e) {
        $Message = "Database connection failed";
    }
}