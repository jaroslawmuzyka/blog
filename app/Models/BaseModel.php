<?php
declare(strict_types=1);

namespace App\Models;

use Exception;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PDO;
use PDOException;
use App\PdoConnection;

abstract class BaseModel
{
    protected function getPdo(): PDO
    {
        try {
            $pdo = new PdoConnection();
            return $pdo->getConnectionPdo();
        } catch (PDOException $e) {
            $log = new Logger('DatabaseConnection');
            $log->pushHandler(new StreamHandler('../logs/logs.log', Level::Error));
            $log->error('Błąd połączenia z bazą danych');
            header("Location: 404");
            die("Błąd połaczenia z bazą danych.");
        }
    }
}