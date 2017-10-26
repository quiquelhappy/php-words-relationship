<?php
function wordsRelationship($one, $two, $precission){

  // the number of related words you want to analyze
  if ($precision == null) {
    $precision = 10;
  }

  $firstGroup= relatedWords($one, $precision); // first word related words
  $secondGroup= relatedWords($two, $precision); // second word related words

  // the word with fewer related words is used to make a comparison with the same number of related words
  if (count($firstGroup) < count($secondGroup)) {
    $quantity = count($firstGroup);
  } elseif (count($firstGroup) > count($secondGroup)) {
    $quantity = count($secondGroup);
  } elseif (count($firstGroup) == count($secondGroup)) {
    $quantity = count($firstGroup); // can  be both
  }

  // if a word group has more words than another is sliced down to the number of related words on the samallest word group
  $firstGroupSlice = array_slice($firstGroup, 0, $quantity);
  $secondGroupSlice = array_slice($secondGroup, 0, $quantity);

  // words that are only used in one of two groups of words
  $groupDifference = array_diff($firstGroupSlice, $secondGroupSlice);

  // % calculation
  $groupDifferencePercent = ($quantity - count($groupDifference)) / $quantity * 100;
  return $groupDifferencePercent;

}
?>
