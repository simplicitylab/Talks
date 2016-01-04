<?php
/**
 * Example of using NlpTools Tokenizer
 *
 * @author Glenn De Backer <glenn@simplicity.be>
 */
include('vendor/autoload.php');

use \NlpTools\Tokenizers\WhitespaceAndPunctuationTokenizer;

// text we will be converting into tokens
$text = "PHP is a server side scripting language designed for web development
but also used as a general-purpose programming language.";

// initialize Whitespace and punctuation tokenizer
$tokenizer = new WhitespaceAndPunctuationTokenizer();

// dump array of tokens
var_dump($tokenizer->tokenize($text));


?>
