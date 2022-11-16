<?php

namespace App\Components\Utils;

// array => [
//     [
//         'probability' => .2,
//         'data' => [
//             'class' => Potion::class,
//             'construct' => ['name' => 'Maxi Health Potion',
////       'description' => 'A potion that restores 100 health',
////       'health' => 100,]
//             ]
//      ]
//]

class ProbabilityPicker
{
    /**
     * @var array
     */
    protected array $sourceData;

    public function __construct(array $sourceData)
    {
        $this->sourceData = $sourceData;
    }

    public function pickItem(): array
    {
        $items = $this->sourceData;

        $totalProbability = 0; // This is defined to keep track of the total amount of entries

        foreach ($items as $itemData) {
            $probability = $itemData['probability'] ?? .5;
            $totalProbability += $probability;
        }

        $stopAt = random_int(0, $totalProbability); // This picks a random entry to select
        $currentProbability = 0; // The current entry count, when this reaches $stopAt the winner is chosen

        foreach ($items as $itemData) { // Go through each possible item
            $probability = $itemData['probability'] ?? .5;
            $currentProbability += $probability; // Add the probability to our $currentProbability tracker
            if ($currentProbability >= $stopAt) { // When we reach the $stopAt variable, we have found our winner
                return $itemData;
            }
        }

        return $this->sourceData[(int)random_int(0, (count($this->sourceData) - 1))];// todo return full random
    }
}