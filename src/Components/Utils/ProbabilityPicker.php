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
        $tickets = [];
        foreach ($items as $itemIndex => $itemData) {
            $ticketCount = round($itemData['probability'] * 1000, 0);
            $t = 0;

            while ($t < $ticketCount) {
                $tickets[] = $itemIndex;
                $t++;
            }
        }
        // shuffle array $tickets
        shuffle($tickets);
        $randomTicket = $tickets[random_int(0, count($tickets) - 1)];

        return $this->sourceData[$randomTicket];
    }
}