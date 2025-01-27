<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class PaperPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class TotoniorPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
       // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------
        $side = $this->result->getChoicesFor($this->mySide);
        $opponent = $this->result->getChoicesFor($this->opponentSide);
        $len = count($opponent);
        $len1 = count($side);
        $lastscore = $this->result->getLastScoreFor($this->mySide);
        $lastmove =  $this->result->getLastChoiceFor($this->mySide);

        // If lose then change algo, predict the move that he will do
        // Use last 2 moves of opponent to predict the new move to do
        if ($lastscore == 0)
            if ($lastmove == 'rock') {
                if ($len1 > 2 and $side[$len1 - 2] == 'scissors')
                    return parent::rockChoice();
                else
                    return parent::scissorsChoice();
            } else if ($lastmove == 'scissors') {
                if ($len1 > 2 and $side[$len1 - 2] == 'paper')
                    return parent::scissorsChoice();
                else
                    return parent::paperChoice();
            } else {
                if ($len1 > 2 and $side[$len1 - 2] == 'rock')
                    return parent::paperChoice();
                else
                    return parent::rockChoice();
            }

        // Else Use the last choice of opponent and the prelast  
        if ($this->result->getLastChoiceFor($this->opponentSide) == 'paper')
            if ($len > 2 and $opponent[$len - 2] == 'rock')
                return parent::rockChoice();
            else
                return parent::scissorsChoice();
        else if ($this->result->getLastChoiceFor($this->opponentSide) == 'scissors')
            if ($len > 2 and $opponent[$len - 2] == 'paper')
                return parent::paperChoice();
            else
                return parent::rockChoice();
        else
            if ($len > 2 and $opponent[$len - 2] == 'scissors')
                return parent::scissorsChoice();
            else
                return parent::paperChoice();
  }
};
