<?php
/**
 * Example of using stopwords when using NlpTools
 *
 * @author Glenn De Backer <glenn@simplicity.be>
 */
include('vendor/autoload.php');

use \NlpTools\Tokenizers\WhitespaceAndPunctuationTokenizer;
use \NlpTools\Documents\TokensDocument;
use \NlpTools\Utils\StopWords;

// text we will be converting into tokens
$text = "PHP is a server side scripting language designed for web development
but also used as a general-purpose programming language.";

// define a list of stop words
$stop = new StopWords(array("is", "a", "as", "for", "also", ".", ",", "!","-"));

// initialize Whitespace and punctuation tokenizer
$tokenizer = new WhitespaceAndPunctuationTokenizer();

// init token document
$doc = new TokensDocument($tokenizer->tokenize($text));

// apply our stopwords
$doc->applyTransformation($stop);

var_dump($doc->getDocumentData());
?>
