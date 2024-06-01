<?php
$host = 'localhost';
$db = 'testdb';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);


// Create table users
$TableUsers = 'CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  uname TEXT NOT NULL,
  PWD TEXT NOT NULL
)';
$pdo->exec($TableUsers);

// Create table wallet 
$TableWallet = 'CREATE TABLE IF NOT EXISTS wallet (
  id INT AUTO_INCREMENT PRIMARY KEY,
  uname INT NOT NULL,
  balance INT NOT NULL
)';
$pdo->exec($TableWallet);

//create table transactions
$TableTransactions = 'CREATE TABLE IF NOT EXISTS transactions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  uname INT NOT NULL,
  amount INT NOT NULL
)';
$pdo->exec($TableTransactions);

// create table voucher
$TableVoucher = 'CREATE TABLE IF NOT EXISTS voucher (
id INT AUTO_INCREMENT PRIMARY KEY,
  uname INT NOT NULL,
  amount INT NOT NULL,
  code TEXT NOT NULL
)';
$pdo->exec($TableVoucher);
