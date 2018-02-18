<?php

namespace iMi\RoboDatabase\Task;

trait loadTasks {
    /**
     * @param array $databaseConfiguration
     * - dbname
     * - username
     * - password
     * - host
     * @see \IMI\DatabaseHelper\Mysql::getConnection
     * @return mixed
     */
    protected function taskDatabaseStack($databaseConfiguration)
    {
        return $this->task(DumpTask::class, $databaseConfiguration);
    }
}