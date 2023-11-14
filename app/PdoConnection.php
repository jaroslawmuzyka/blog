<?php
declare(strict_types=1);

namespace App;

use PDO;

class PdoConnection implements PdoConnectionInterface
{
    private string $host = '';
    private string $db = '';
    private string $user = '';
    private string $password = '';

    public function getConnectionPdo(): PDO
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=UTF8";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        return new PDO($dsn, $this->user, $this->password, $options);
    }
}