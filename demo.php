<?php

/**
 * @author Mateus Schmitz <matteuschmitz@gmail.com>
 * @package Demo
 */

require('./vendor/autoload.php');

$blockchain = new \BlockchainPHP\Blockchain([
    'blocks_dir'            => __DIR__ . './data/',
    'indexes_dir'           => __DIR__ . './data/',
    'hash_algorithm'        => 'sha256',
    'hash_algorithm_cycles' => 2,
    'block_max_size'        => '5MB',
    'blocks_file_max_size'  => '500MB',
    'blocks_file_prefix'    => 'demo',
    'difficulty'            => 0,
]);

$block = (new \BlockchainPHP\Block('This is the content of the block'))
    ->setMerkleRootHash('hashofmerkleroot');

$blockchain->addBlock($block);
