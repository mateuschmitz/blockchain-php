<?php

/**
 * @author Mateus Schmitz <matteuschmitz@gmail.com>
 * @package BlockchainPHP\Block
 */

namespace BlockchainPHP;

class Block
{
    private $index;

    private $timestamp;

    private $prevhash;

    private $blockhash;

    private $length;

    private $data;

    /**
     * Sets up the data to be saved on block and instance the object
     * 
     * @param mixed   $data      can be string/array/object
     * @param integer $timestamp blocks's timestamp
     */
    public function __construct($data, $timestamp = null)
    {
        $this->data = $data;
        $this->timestamp = is_null($timestamp) ? strtotime('now') : $timestamp;
    }

    public function validate()
    {}

    public function setData($data)
    {}
}
