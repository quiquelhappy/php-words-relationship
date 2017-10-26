![powered by datamuse](https://i.imgur.com/VEZEDkj.png)

An API programmed in PHP that helps you find words related to each other thanks to the database of datamuse (that works with a neural network that analyzes thousands of wikipedia articles) and that helps you to find matches between two words.
------------------------------------------------------------------------

----------
# How to use
**1 Import wordsRelationship using PHP include_once on the file you want to use it.**

`include_once 'wordsRelationship/autoload.php';`

**2 Use.** 

**Get related words (Returns array)**

`$word` = the original word you want to get related words from
`$quantity` = how many related words you want
*you can use this function without defining `$quantity`, which is by default `10.`

    relatedWords($word, $quantity);
   Example:

    relatedWords('football', '15');
output (`json_encode(relatedWords('football', '15'));`)
 
> [
>  "basketball",
>  "rugby",
>  "hockey",
>  "pigskin",
>  "league",
>  "volleyball",
>  "sport",
>  "game",
>  "golf",
>  "player",
>  "championship",
>  "team",
>  "ball",
>  "nfl",
>  "football"
> ]


----------
**Get words relationship % (Returns int)**
`$one` = first word
`$two` = second word
`$precision` = maximum words to analyze
*you can use this function without defining `$precision`, which is by default `10.`

    wordsRelationship($one, $two, $precision);
Example: 

    wordsRelationship('soccer', 'football', 15);
Output (`wordsRelationship('football', 'soccer', 15);`)

> 40 *(%)*
