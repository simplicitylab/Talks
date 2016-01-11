<?php
/**
 * Example of tokenizing using NlpTools Tokenizer
 *
 * @author Glenn De Backer <glenn@simplicity.be>
 */
include('vendor/autoload.php');

use \NlpTools\Tokenizers\WhitespaceTokenizer;

// text we will be converting into tokens
$text = "PHP is a server side scripting language.";

// initialize Whitespace and punctuation tokenizer
$tokenizer = new WhitespaceTokenizer();

// print array of tokens
print_r($tokenizer->tokenize($text));
?>
