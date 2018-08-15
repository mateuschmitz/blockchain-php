<?php

/**
 * @author Mateus Schmitz <matteuschmitz@gmail.com>
 * @package BlockchainPHP\Block
 */

namespace BlockchainPHP;

class Block
{
    /**
     * Sets up the data to be saved on block and instance the object
     * 
     * @param mixed $data            can be string/array/object
     * @param string $merkleRootHash hash generates by Merkle Root Algorithm
     */
    public function __construct($data = null, $merkleRootHash = null)
    {}

    public function validate()
    {}

    public function setData($data)
    {}

    public function setMerkleRootHash($merkleRootHash)
    {
        return $this;
    }
}
