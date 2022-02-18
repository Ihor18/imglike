<?php

namespace App\Console\Commands;

use App\Models\History;
use App\Models\Season;
use App\Models\SeasonHistory;
use Illuminate\Console\Command;
use App;

class SeasonCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:season';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check season';

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
        $openSeason = Season::where([['game',History::TETRIS],['status',Season::OPEN]])->first();
        if(!$openSeason){
            echo "not exist open season\n";
            $openSeason = new Season();
            $openSeason->game = History::TETRIS;
            $openSeason->status = Season::OPEN;
            $openSeason->save();
            echo "start new season\n";
        }
        if($openSeason->created_at < now()->subDays(30)){
            $winUser = SeasonHistory::where('season_id',$openSeason->id)->orderBy('score','DESC')->first();
            $openSeason->win = $winUser->win;
            $openSeason->lose = $winUser->lose;
            $openSeason->score = $winUser->score;
            $openSeason->user = $winUser->name;
            $openSeason->status = Season::CLOSE;
            $openSeason->save();
            echo "close season\n";
            $newSeason = new Season();
            $newSeason->game = History::TETRIS;
            $newSeason->status = Season::OPEN;
            $newSeason->save();
            echo "start new season\n";
            $user = App\Models\User::where('name',$winUser->name)->first();
            if($user){
                $user->tetris_season_win ++;
                $user->save();
                echo "user $winUser->name saved\n";
            }
        }
    }
}
