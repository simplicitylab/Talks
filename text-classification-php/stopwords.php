<?php
/**
 * Example of using stopwords when using NlpTools
 *
 * @author Glenn De Backer <glenn@simplicity.be>
 */
include('vendor/autoload.php');

use \NlpTools\Tokenizers\WhitespaceTokenizer;
use \NlpTools\Documents\TokensDocument;
use \NlpTools\Utils\StopWords;

// text we will be converting into tokens
$text = "PHP is a server side scripting language";

// define a list of stop words
$stop = new StopWords(array("is", "a", "as"));

// initialize Whitespace tokenizer
$tokenizer = new WhitespaceTokenizer();

// init token document
$doc = new TokensDocument($tokenizer->tokenize($text));

// apply our stopwords
$doc->applyTransformation($stop);

// print filtered tokens
print_r($doc->getDocumentData());

?>
