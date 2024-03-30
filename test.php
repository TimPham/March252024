<?php
// Full list of people
$firstNames = [
    "Sophie",
    "Liam",
    "Ava",
//    "Noah",
//    "Isabella",
//    "Ethan",
//    "Mia",
//    "Mason",
//    "Olivia",
//    "Benjamin"
];

// Keep track of whoever did not receive a gift
$firstNamesNotReceived = $firstNames;

// Keep track of whoever received a gift - initially no one would receive a gift as we haven't matched anyone
$firstNamesReceived = [];

// Sophie
// ["Liam", "Ava"]
// to:
// Liam [1]
// Ava  [2]

// Liam
// ["Ava"] (Assuming Sophie matched with Liam)
// ["Sophie"] (Assuming Sophie matched with Ava)
// ["Sophie", "Ava"]
// to:
// Sophie [3]
// Ava    [4]

// Ava
// ["Sophie"]
// to:
// Sophie [5]
// Liam   [6]

// Go through the list of names
foreach ($firstNames as $currentIndex => $firstName) {
    // List of users other than gifter who are eligible to receive a gift
    $firstNamesOtherThanGifter = array_diff($firstNamesNotReceived, [$firstName]);

    // Liam or Ava
    // Ava and Sophie - Ava or Sophie
    $firstNamesOtherThanGifter = array_diff($firstNamesOtherThanGifter, $firstNamesReceived);

    // Pull random recipient from who has not yet received a gift
    $firstNameGiftee = $firstNamesOtherThanGifter[array_rand($firstNamesOtherThanGifter)];

    // Liam
    // Ava, Sophie

    // Remove the person who has now received a gift from receiving any additional gifts
    $firstNamesNotReceived = array_diff($firstNamesNotReceived, [$firstNameGiftee]);
    $firstNamesReceived[] = $firstNameGiftee;

    // Message that says [gifter name] gave a gift to [recipient name]
    echo sprintf('%s gave a gift to %s', $firstName, $firstNameGiftee) . "\n";
}
