<?php

class Query
{
    public $notebookElements;
    protected $connection;

    public static $notebookTable = 'notebook';

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

    public function addNotebookElements($notebookElements)
    {
        for($i=0;$i<=14;$i++){
            echo $notebookElements['title'][$i]."\n";

            $statement = $this->connection->prepare("INSERT INTO ".self::$notebookTable." (title,image) 
            VALUES ('".$notebookElements['title'][$i]."',
            '".$notebookElements['image'][$i]."'
            )");

            $statement->execute();
        }
    }
}