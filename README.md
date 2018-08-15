# Blockchain PHP

A simple Blockchain implementation in PHP

Blockchain Concept
==================

Goals
=====

Usage
=====

```php
<?php

require('./vendor/autoload.php');

$blockchain = new \BlockchainPHP\Blockchain([
    'blocks_dir'            => __DIR__ . './data/', // blocks will be saved here
    'indexes_dir'           => __DIR__ . './data/', // indexes will be saved here too
    'hash_algorithm'        => 'sha256', // algorithm used, see http://php.net/manual/pt_BR/function.hash-algos.php
    'hash_algorithm_cycles' => 2, // how many times the algorithm will be run over the data
    'block_max_size'        => '5MB', // max size of each block
    'blocks_file_max_size'  => '500MB', // max size of each file of chain
    'blocks_file_prefix'    => 'demo', // if you wanna add a prefix on files names
    'difficulty'            => 0, // difficulty, basically the number of zeros at beginning of block's hash
]);


$blockchain->addBlock(new \BlockchainPHP\Block('This is the content of the block'));

```


**This projects it's just a proof of concept and doesn't must to be used in production environment.**
