<?php
// Array of sample text strings
$textArray = [
    "Hello, world!",
    "How are you today?",
    "It's a beautiful day!",
    "Goodbye!",
    "Have a nice day!",
    "Random text here."
];

// Generate a random index
$randomIndex = array_rand($textArray);

// Display the random text
echo $textArray[$randomIndex];
?>
