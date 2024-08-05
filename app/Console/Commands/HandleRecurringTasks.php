<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class HandleRecurringTasks extends Command
{
    protected $signature = 'tasks:handle-recurring';
    protected $description = 'Handle recurring tasks and create new instances if needed';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Task::handleRecurringTasks();
    }
}
