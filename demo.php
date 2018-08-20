<?php

/**
 * @author Mateus Schmitz <matteuschmitz@gmail.com>
 * @package Demo
 */

require('./vendor/autoload.php');

define('ROOT_PATH', __DIR__);

$blockchain = new \BlockchainPHP\Blockchain([
    'name'                 => 'BlockchainPHP',
    'version'              => 5,
    'blocks_dir'           => __DIR__ . '/data/',
    'block_max_size'       => '5MB',
    'blocks_file_max_size' => '500MB'
]);

$block = new \BlockchainPHP\Block('This is the content of the block');
$block = new \BlockchainPHP\Block('This is the content of the block', strtotime('now'));

$blockchain->addBlock($block);
