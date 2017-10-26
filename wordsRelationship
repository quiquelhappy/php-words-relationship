<?php
include_once 'relatedWords.php'; // used to get related words and find matches between them.

$precision = $_REQUEST[precision];  // the number of maximum related words that should by analyzed
if ($precision == null) {
  $precision = 10;
}

$one = $_REQUEST[one];  
$two = $_REQUEST[two];  

$firstGroup= relatedWords($one, $precision); // first word related words
$secondGroup= relatedWords($two, $precision); // second word related words

// the word with fewer related words is used to make a comparison with the same number of related words
if (count($firstGroup) < count($secondGroup)) {
  $quantity = count($firstGroup);
} elseif (count($firstGroup) > count($secondGroup)) {
  $quantity = count($secondGroup);
} elseif (count($firstGroup) == count($secondGroup)) {
  $quantity = count($firstGroup); // can be both
}

// if a word group has more words than anothed is sliced down to the one with less words
$firstGroupSlice = array_slice($firstGroup, 0, $quantity);
$secondGroupSlice = array_slice($secondGroup, 0, $quantity);

// words that are only used in one of two groups of words

// % calculation
$groupDifference = array_diff($firstGroupSlice, $secondGroupSlice);

// json response
$groupDifferencePercent = ($quantity - count($groupDifference)) / $quantity * 100;
$response = array('percent' => $groupDifferencePercent, 'difference' => $groupDifference, 'coincidence' => array_intersect($firstGroupSlice,$secondGroupSlice));
print(json_encode($response));
?>
