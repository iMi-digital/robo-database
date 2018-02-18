<?php

namespace iMi\RoboDatabase\Task;

trait loadTasks {
    /**
     * @param array $databaseConfiguration
     * - dbname
     * - username
     * - password
     * - host
     * @param array $tableDefinitions Table group definitions
     * @see \IMI\DatabaseHelper\Mysql::getConnection
     * @return mixed
     */
    protected function taskDatabaseStack($databaseConfiguration, $tableGroupDefinitions = [])
    {
        return $this->task(DumpTask::class, $databaseConfiguration, $tableGroupDefinitions);
    }
}