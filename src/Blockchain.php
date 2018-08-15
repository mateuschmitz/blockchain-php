<?php

/**
 * @author Mateus Schmitz <matteuschmitz@gmail.com>
 * @package BlockchainPHP\Blockchain
 */

namespace BlockchainPHP;

class Blockchain
{
    /**
     * Sets up all the options to the blockchain and instance the chain
     * 
     * @param array $settings settings to be used
     */
    public function __construct(array $settings = [])
    {}

    private function setUp(array $settings)
    {}

    private function loadBlockchain()
    {}

    private function getLastPositionBlock()
    {}

    private function getBlock()
    {}

    public function addBlock(Block $block)
    {}

    public function getLastBlock()
    {}

    public function getBlockByHash($hash)
    {}

    public function getBlockByIndex($index)
    {}

    public function setBlockValidation(callable $callable)
    {}
}
