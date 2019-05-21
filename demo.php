<?php

/**
 * @author Mateus Schmitz <matteuschmitz@gmail.com>
 * @package Demo
 */

require('./vendor/autoload.php');

define('ROOT_PATH', __DIR__);
define('DS', DIRECTORY_SEPARATOR);
date_default_timezone_set('America/Sao Paulo');

$blockchain = new \BlockchainPHP\Blockchain([
    'name'       => 'BlockchainPHP',
    'version'    => 1,
    'blocks_dir' => __DIR__ . '/data/'
]);

$faker = Faker\Factory::create();

for ($i = 1; $i <= 10; $i++) {
	
	$block = new \BlockchainPHP\Block([
		'author' => 'Mateus Schmitz', 
		'content' => $faker->realText(mt_rand(10, 1000))
	]);

	$blockchain->addBlock($block);
}

\BlockchainPHP\Utils::dumpBlockchain($blockchain);

