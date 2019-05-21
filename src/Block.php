<?php

/**
 * @author Mateus Schmitz <matteuschmitz@gmail.com>
 * @package BlockchainPHP\Block
 */

namespace BlockchainPHP;

class Block
{
    const PREVIOUS_GENESIS_HASH = '0000000000000000000000000000000000000000000000000000000000000000';

    const BLOCK_DATA_LIMIT = 50000;

    const HASH_ALGORITHM = 'sha256';

    private $timestamp;

    private $previousHash = self::PREVIOUS_GENESIS_HASH;

    private $blockHash;

    private $dataLength;

    private $data;

    /**
     * Sets up the data to be saved on block and instance the object
     * 
     * @param mixed $data can be string/array/object
     */
    public function __construct($data)
    {
        $this->data       = json_encode($data);
        $this->dataLength = strlen($this->data);
        $this->timestamp  = strtotime('now');

        if ($this->dataLength > self::BLOCK_DATA_LIMIT) {
            throw new \InvalidArgumentException(
                "'Data' field can't have more than " . self::BLOCK_DATA_LIMIT . " characters"
            );
        }
    }

    /**
     * Generate the hash to the actual block
     * 
     * @return bool
     */
    public function generateBlockHash()
    {
        if (!isset($this->timestamp)) {
            throw new \LogicException("Attribute 'timestamp' invalid");
        }

        if (!isset($this->previousHash)) {
            throw new \LogicException("Attribute 'previousHash' invalid.");
        }

        if (!isset($this->dataLength)) {
            throw new \LogicException("Attribute 'dataLength' invalid");
        }

        if (!isset($this->data)) {
            throw new \LogicException("Attribute 'data' invalid");
        }

        $dataToHash = $this->timestamp.$this->previousHash.$this->dataLength.$this->data;
        $this->blockHash = hash(self::HASH_ALGORITHM, $dataToHash);

        return true;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function getPreviousHash()
    {
        return $this->previousHash;
    }

    public function getBlockHash()
    {
        return $this->blockHash;
    }

    public function getDataLength()
    {
        return $this->dataLength;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    public function setPreviousHash($previousHash)
    {
        $this->previousHash = $previousHash;
        return $this;
    }

    public function setBlockHash($blockHash)
    {
        $this->blockHash = $blockHash;
        return $this;
    }

    public function setDataLength($dataLength)
    {
        if ($dataLength > 50000) {
            throw new \InvalidArgumentException("'Data' field can't have more than 50000 characters");
        }

        $this->dataLength = $dataLength;
        return $this;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
