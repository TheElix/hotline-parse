<?php

class Query
{

    protected $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function selectAll($table)
    {
        $statement = $this->connection->prepare("SELECT * FROM {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}