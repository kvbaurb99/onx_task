<?php


// Thesaurus class instance
class Thesaurus {
    private $thesaurus;

    // Constructor
    function __construct($thesaurus) {
        $this->thesaurus = $thesaurus;
    }
    
    function getSynonyms($word) {
        $synonyms = isset($this->thesaurus[$word]) ? $this->thesaurus[$word] : array();
        $result = array("word" => $word, "synonyms" => $synonyms);
        return json_encode($result);
    }
}

$thesaurus = new Thesaurus(array(
    "market" => array("trade"), 
    "small" => array("little", "compact")
));

echo $thesaurus->getSynonyms("small"); // {"word":"small","synonyms":["little","compact"]}
echo $thesaurus->getSynonyms("asleast"); // {"word":"asleast","synonyms":[]}

?>