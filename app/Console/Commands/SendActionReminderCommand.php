<?php

namespace App\Console\Commands;

use App\Models\Crm\Action;
use App\Notifications\ActionReminderNotification;
use Illuminate\Console\Command;

class SendActionReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Action reminder emails to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $actions = Action::with('owner')
            ->where('due_at', '==', now()->toDateTimeString())
            ->get();

        foreach ($actions as $action) {
            $action->owner->notify(new ActionReminderNotification($task));
            $action->update(['reminder_at' => NULL]);
        }

        return 0;
    }
}
