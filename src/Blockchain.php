<?php

/**
 * @author Mateus Schmitz <matteuschmitz@gmail.com>
 * @package BlockchainPHP\Blockchain
 */

namespace BlockchainPHP;

class Blockchain
{
    const DEFAULT_VERSION = '1';

    const DEFAULT_BLOCK_MAX_SIZE = '10MB';

    const DEFAULT_BLOCKS_FILE_MAX_SIZE = '500MB';

    private $name;

    private $version = self::DEFAULT_VERSION;

    private $blocksDir;

    private $blockMaxSize = self::DEFAULT_BLOCK_MAX_SIZE;

    private $blocksFileMaxSize = self::DEFAULT_BLOCKS_FILE_MAX_SIZE;

    /**
     * Sets up all the options to the blockchain and instance the chain
     * 
     * @param array $settings settings to be used
     */
    public function __construct(array $settings)
    {
        $this->setUp($settings);
    }

    private function validateSetUp()
    {
        if (empty($this->name)) {
            throw new \InvalidArgumentException("Invalid 'name'");
        }

        if (empty($this->version)) {
            throw new \InvalidArgumentException("Invalid 'version'");
        }

        if (!is_writable($this->blocksDir)) {
            throw new \LogicException("Invalid 'blocks_dir'");
        }

        if (!preg_match('/^([0-9]){1,4}(KB|MB|GB|TB)$/', $this->blockMaxSize)) {
            throw new \LengthException("Invalid 'block_max_size'");
        }

        if (!preg_match('/^([0-9]){1,4}(KB|MB|GB|TB)$/', $this->blocksFileMaxSize)) {
            throw new \LengthException("Invalid 'blocks_file_max_size'");
        }

        return true;
    }

    private function setUp(array $settings)
    {
        if (isset($settings['name']) && !empty($settings['name'])) {
            $this->name = $settings['name'];
        }

        if (isset($settings['version']) && !empty($settings['version'])) {
            $this->version = $settings['version'];
        }

        if (isset($settings['blocks_dir']) && !empty($settings['blocks_dir'])) {
            $this->blocksDir = $settings['blocks_dir'];
        }

        if (isset($settings['block_max_size']) && !empty($settings['block_max_size'])) {
            $this->blockMaxSize = $settings['block_max_size'];
        }

        if (isset($settings['blocks_file_max_size']) && !empty($settings['blocks_file_max_size'])) {
            $this->blocksFileMaxSize = $settings['blocks_file_max_size'];
        }

        $this->validateSetUp();

        return $this;
    }

    private function getLastPositionBlock()
    {}

    private function getBlock()
    {}

    public function addBlock(Block $block)
    {}

    public function getBlocks()
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
