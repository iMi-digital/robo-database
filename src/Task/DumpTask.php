<?php
namespace iMi\RoboDatabase\Task;

use IMI\DatabaseHelper\Mysql;
use IMI\DatabaseHelper\Operations\Dump;
use Robo\Collection\CollectionBuilder;
use Robo\Exception\TaskException;
use Robo\Task\StackBasedTask;

class DumpTask extends StackBasedTask
{
    use \Robo\Common\ExecCommand;

    /**
	 * @param null|string $pathToWpcli
	 *
	 * @throws \Robo\Exception\TaskException
	 */
    public function __construct($databaseSettings, $tableGroupDefinitions = [])
    {
        $this->_helper = new Mysql($databaseSettings);
        $this->_helper->setTableDefinitions($tableGroupDefinitions);
        $this->_operation = new Dump($this->_helper);
    }

    protected function getDelegate() {
        return $this->_operation;
    }

    protected function _dump()
    {
        foreach($this->_operation->createExec()->getCommands() as $command) {
            $this->executeCommand($command);
        }
    }
}
