<?php

namespace App\Services;

class SimulationService
{
  private $play, $predictions;
  private $RANDOMNESS_OF_STRENGTH = 10;
  public $team1_score, $team2_score;

  function __construct($play, $predictions)
  {
    $this->play = $play;
    $this->predictions = $predictions;
  }

  public function simulate()
  {
    $team1Id = $this->play->team1_id;
    $team2Id = $this->play->team2_id;

    $strengthTeam1 = $this->getStrengthOfTeam($team1Id);
    $strengthTeam2 = $this->getStrengthOfTeam($team2Id);

    return $this->play($strengthTeam1, $strengthTeam2);
  }

  private function getStrengthOfTeam($teamId)
  {
    $randomness = random_int(
      -$this->RANDOMNESS_OF_STRENGTH / 2,
      $this->RANDOMNESS_OF_STRENGTH / 2
    );

    foreach ($this->predictions as $prediction) {
      if ($prediction->team_id === $teamId) {
        return $prediction->computed_strength + $randomness;
      }
    }
    return 0;
  }

  private function play($strength1, $strength2)
  {
    $score1 = 0;
    $score2 = 0;

    if (abs($strength1 - $strength2) <= 5) {
      $gameFun = random_int(1, 4);
      $score1 += $gameFun;
      $score2 += $gameFun;
    } else if ($strength1 > $strength2) {
      $score1 += random_int(2, 5);
      $score2 += random_int(1, 2);
    } else {
      $score1 += random_int(1, 2);
      $score2 += random_int(2, 5);
    }

    return [$score1, $score2];
  }
}
