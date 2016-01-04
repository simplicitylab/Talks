<?php
/**
 * Example of stemming using NlpTools PorterStemmer
 *
 * @author Glenn De Backer <glenn@simplicity.be>
 */
include('vendor/autoload.php');

use \NlpTools\Stemmers\PorterStemmer;

// init PorterStemmer
$stemmer = new PorterStemmer();

// stemming variants of upload
printf("%s\n", $stemmer->stem("uploading"));
printf("%s\n", $stemmer->stem("uploaded"));
printf("%s\n", $stemmer->stem("uploads"));

// stemming variants of delete
printf("%s\n", $stemmer->stem("delete"));
printf("%s\n", $stemmer->stem("deleted"));
printf("%s\n", $stemmer->stem("deleting"));

// stemming variants of computer
printf("%s\n", $stemmer->stem("computer"));
printf("%s\n", $stemmer->stem("computers"));

?>
