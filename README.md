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
    'name'                  => 'BlockchainPHP',    // blockchain's name
    'version'               => '1',                // blockchain's version - optional
    'blocks_dir'            => __DIR__ . '/data/', // blocks will be saved here 
]);

// then, we create the block
$block = new \BlockchainPHP\Block('This is the content of the block');

// so, we save the block into the chain
$blockchain->addBlock($block);

// Easy, no? :D

```

Troubleshooting
===============

**This projects it's just a proof of concept and doesn't to be used at production environment.**
