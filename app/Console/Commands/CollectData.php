<?php

namespace App\Console\Commands;

use App\AcceptedTickets;
use App\InvalidTickets;
use App\OpenTickets;
use Illuminate\Console\Command;

class CollectData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dotboard:count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $data = app('db')
            ->select('select * from mantis_bug_table');

        $counts = [
            'open' => 0,
            'accepted' => 0,
            'invalid' => 0
        ];

        foreach ($data as $ticket) {
            if ($ticket->status === 10) {
                $counts['open'] += 1;
            } else if ($ticket->status === 90 && $ticket->resolution === 40) {
                $counts['invalid'] += 1;
            } else {
                $counts['accepted'] += 1;
            }
        }

        OpenTickets::create([
            'amount' => $counts['open']
        ]);

        InvalidTickets::create([
            'amount' => $counts['invalid']
        ]);

        AcceptedTickets::create([
            'amount' => $counts['accepted']
        ]);

        $this->info('Success.');
    }
}
