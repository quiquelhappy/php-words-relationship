<?php
function relatedWords($word, $quantity){

  // the number of related words you want
  if ($quantity == null) {
    $quantity = 10;
  }

  // datamuse api json request
  $request = file_get_contents('https://api.datamuse.com/words?ml='.$word.'&max='.$quantity);
  $loop = $quantity;
  $response = json_decode($request);

  // getting the number of words you want + original word
  $i=0;
  while ($i++ < $quantity)
  {
    if ($response[$i]->word != "") {
      $wordsArray[] = $response[$i]->word;
    }
  }
  $wordsArray[$quantity-1] = $word;
  
  // return words array that can be accessed by php
  return $wordsArray;
}
?>
