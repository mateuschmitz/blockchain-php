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

//first we instance the blockchain
$blockchain = new \BlockchainPHP\Blockchain([
    'blocks_dir'            => __DIR__ . './data/', // blocks will be saved here
    'indexes_dir'           => __DIR__ . './data/', // indexes will be saved here too
    'hash_algorithm'        => 'sha256', // algorithm used, see 'hash-algos' function
    'hash_algorithm_cycles' => 2, // how many times the algorithm will be run over the data
    'block_max_size'        => '5MB', // max size of each block
    'blocks_file_max_size'  => '500MB', // max size of each file of chain
    'blocks_file_prefix'    => 'demo', // if you wanna add a prefix on files names
    'difficulty'            => 0, // difficulty, basically the number of zeros at beginning of block's hash
]);

// then, we create the block
$block = new \BlockchainPHP\Block('This is the content of the block', 'hashofmerkleroot');

// so, we save the block into the chain
$blockchain->addBlock($block);

// Easy, no? :D

```

Troubleshooting
===============

**This projects it's just a proof of concept and doesn't must to be used in production environment.**
