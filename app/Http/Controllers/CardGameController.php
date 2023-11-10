<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardGameController extends Controller
{
    public function playGame()
    {
        $playerCard = rand(1, 13); // Simulate a player's hand with a random card (1 to 13 for Ace to King).
        $currentCard = rand(1, 13); // Simulate the current card drawn from the deck.

        $action = $this->decideAction($playerCard, $currentCard);

        return view('card-game', [
            'playerCard' => $playerCard,
            'currentCard' => $currentCard,
            'action' => $action,
        ]);
    }

    private function decideAction($playerCard, $currentCard)
    {
        if ($playerCard == 13) { // King
            return 'Choose a lower card.';
        } elseif ($playerCard == 6) {
            // When you have a 6, choose between higher and lower cards with equal probability.
            $decision = rand(0, 1); // 0 for lower, 1 for higher
            return ($decision == 0) ? 'Choose a lower card.' : 'Choose a higher card.';
        } else {
            // Default action when not having a King or a 6.
            return 'Make your choice.';
        }
    }
}
