<?php


class DB extends PDO {
    private const HOST = "localhost";
    private const DATABASE = "velekma";
    private const PORT = 3306;
    private const USER = "root";
    private const PASSWORD = "";

    public function __construct() {
        $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DATABASE . ";port=" . self::PORT . ";";

        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        parent::__construct($dsn, self::USER, self::PASSWORD, $options);
    }
}