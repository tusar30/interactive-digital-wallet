<?php
require "DBConnect.php";
$Category = "";
function insertTransaction($category, $recipient, $amount)
{
    $date = date("Y-m-d", time());
    $time = date("h:i");
    $connection = connect();

    $query = "INSERT INTO transaction_details (transaction_category, recipient, amount, date, time) VALUES (?, ?, ?, ?, ?)";
    $sql = $connection->prepare($query);

    $sql->bind_param("sssss", $category, $recipient, $amount, $date, $time);
    return $sql->execute();
}

$CategoryError = "";
$PhoneNumber = "";
$PhoneNumberError = "";
$Amount = "";
$AmountError = "";
$Default = "Select a Value";
function getTransactionAll()
{
    $connection = connect();
    $query = "SELECT * FROM transaction_details";
    $sql = $connection->prepare($query);
    $sql->execute();
    $res = $sql->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
}

function search($date, $time)
{
    $connection = connect();
    $query = "SELECT * FROM transaction_details WHERE date = ? AND time = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param('ss', $date, $time);
    $sql->execute();
    $res = $sql->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
}

function searchByDate($date)
{
    $connection = connect();
    $query = "SELECT * FROM transaction_details WHERE date = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param('s', $date);
    $sql->execute();
    $res = $sql->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);
}
function searchByTime($time)
{
    $connection = connect();
    $query = "SELECT * FROM transaction_details WHERE time = ?";
    $sql = $connection->prepare($query);
    $sql->bind_param('s', $time);
    $sql->execute();
    $res = $sql->get_result();
    return $res->fetch_all(MYSQLI_ASSOC);

$CategoryError = "";
$PhoneNumber = "";
$PhoneNumberError = "";
$Amount = "";
$AmountError = "";
$Default = "Select a Value";
