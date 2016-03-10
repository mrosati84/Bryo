<?php

namespace Bryo\Database;

use MongoDB\Driver\Manager;
use Bryo\Database\Contracts\Database;

class MongoDatabase implements Database
{
    private $connection;

    public function connect()
    {
        $this->connection = new Manager('mongodb://localhost:27017');
    }

    /**
     * @return Manager
     */
    public function getConnection()
    {
        return $this->connection;
    }
}