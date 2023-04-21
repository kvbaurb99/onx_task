<?php

// Player class definition
class Player {
    public $name;
    public $score;
    public $gamesPlayed;
    
    // Player class constructor
    function __construct($name) {
        $this->name = $name;
        $this->score = 0;
        $this->gamesPlayed = 0;
    }
}

// Definition of ranking class
class RankingTable {
    public $players = array();
    
    // RakingTable constructor
    function __construct($playerNames) {
        foreach ($playerNames as $name) {
            $this->players[] = new Player($name);
        }
    }
    // Saving score for player
    function recordResult($name, $score) {
        foreach ($this->players as $player) {
            if ($player->name == $name) {
                $player->score += $score;
                $player->gamesPlayed++;
            }
        }
    }
    
    // Method for returning player
    function playerRank($rank) {
        usort($this->players, function($a, $b) {
            if ($a->score == $b->score) {
                if ($a->gamesPlayed == $b->gamesPlayed) {
                    return strcmp($a->name, $b->name);
                }
                return $a->gamesPlayed - $b->gamesPlayed;
            }
            return $b->score - $a->score;
        });
        return $this->players[$rank-1]->name;
    }
}

// New instance of Ranking class
$table = new RankingTable(array('Jan', 'Maks', 'Monika'));

//Saving scores for each player
$table->recordResult('Jan', 2);
$table->recordResult('Maks', 3);
$table->recordResult('Monika', 5);

// Showing winner, logging 'Monika'
echo $table->playerRank(1);

?>