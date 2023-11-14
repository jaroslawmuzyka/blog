<?php
declare(strict_types=1);

namespace App;

use PDO;

interface PdoConnectionInterface
{
    public function getConnectionPdo(): PDO;
}