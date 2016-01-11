<?php
/**
 * Example of tokenizing using NlpTools Tokenizer
 *
 * @author Glenn De Backer <glenn@simplicity.be>
 */
include('vendor/autoload.php');

use NlpTools\Tokenizers\WhitespaceTokenizer;
use NlpTools\Models\FeatureBasedNB;
use NlpTools\Documents\TrainingSet;
use NlpTools\Documents\TokensDocument;
use NlpTools\FeatureFactories\DataAsFeatures;
use NlpTools\Classifiers\MultinomialNBClassifier;

// *************** Training ***************
$training = array(
    array('usa','new york is a hell of a town'),
    array('usa','the statue of liberty'),
    array('usa','new york is in the united states'),
    array('usa','the white house is in washington'),
    array('uk','london is in the uk'),
    array('uk','the big ben is in london'),
);

// hold our training documents
$trainingSet = new TrainingSet();

// our tokenizer
$tokenizer = new WhitespaceTokenizer();

// will hold the features
$features = new DataAsFeatures();

// iterate over training array
foreach ($training as $trainingDocument){
  // add to our training set
  $trainingSet->addDocument(
    $trainingDocument[0], // class
    new TokensDocument($tokenizer->tokenize($trainingDocument[1])) // document
  );
}

// train our Naive Bayes Model
$bayesModel = new FeatureBasedNB();
$bayesModel->train($features, $trainingSet);

// *************** Classify ***************

$testSet = array(
    array('usa','i want to see the statue of liberty'),
    array('usa','this is a picture of the white house'),
    array('usa','where in washington'),
    array('uk','i saw the big ben yesterday'),
    array('uk','i went to london to visit a friend'),
);

// init our Naive Bayes Class using the features and our model
$classifier = new MultinomialNBClassifier($features, $bayesModel);

// iterate over our test set
foreach ($testSet as $testDocument){
  // predict our sentence
  $prediction = $classifier->classify(
      array('usa','uk'), // the classes that can be predicted
      new TokensDocument(
        $tokenizer->tokenize($testDocument[1])
      ) // the sentence
  );

  printf("sentence: %s | class: %s | predicted: %s\n", $testDocument[1], $testDocument[0], $prediction );
}

?>
