<?php

namespace App\Http\Controllers;

use App\AcceptedTickets;
use App\InvalidTickets;
use App\OpenTickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function leaderboard()
    {
        // that query looks a lot like magic, but it isnt:
        // it chooses user name, display name, amount of tickets and score, where score is the sum of all issues reported by that user that:
        //  have status "acknowledged" (30) or greater AND
        //  if the status is "closed" (90), the "resolution" is not "unable to reproduce" (40)
        return app('db')
            ->select('select u.realname as name, u.username as username, sum(b.severity) as score, count(distinct b.id) as amount from mantis_user_table u left join mantis_bug_table b on b.reporter_id = u.id where b.status >= 30 and (b.resolution != 40 or b.status != 90)  group by u.realname, u.username order by score desc;');
    }

    public function open()
    {
        return OpenTickets::all();
    }

    public function invalid()
    {
        return InvalidTickets::all();
    }

    public function accepted()
    {
        return AcceptedTickets::all();
    }
}
