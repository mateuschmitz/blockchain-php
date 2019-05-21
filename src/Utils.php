<?php

/**
 * @author Mateus Schmitz <matteuschmitz@gmail.com>
 * @package BlockchainPHP\Utils
 */

namespace BlockchainPHP;

class Utils
{
	/**
	 * Shows Blocks in a beautiful way
	 * 
	 * @param  Blockchain $blockchain the blockchain instance
	 * @return bool                   always returns true
	 */
	public static function dumpBlockchain(Blockchain $blockchain)
    {
        clearstatcache();

        $sizeFile  = filesize($blockchain->getBlocksFile());
        $fo        = fopen($blockchain->getBlocksFile(), 'rb');
        fseek($fo, 0);

        echo "Blockchain: {$blockchain->getName()} (" .  Blockchain::MAGIC_NUMBER . ")\n\n";
        
        $index = 1;
        while (ftell($fo) < $sizeFile) {

            $header = fread($fo, Blockchain::HEADER_LENGTH);
            $values = self::unpackValues($header);
            $data   = fread($fo, $values['dataLength']);

            echo "Block #" . $index++ . "\n";
            echo "-------------------\n";
            echo "Timestamp:     ". date("d/m/Y H:i:s", $values['timestamp']) . "(" . $values['timestamp'] . ")\n";
            echo "Previous Hash: ". $values['previousHash'] . "\n";
            echo "Block Hash:    " . $values['blockHash'] . "\n";
            echo "Data Length:   " . $values['dataLength'] . "\n";
            echo "Data: ". $data. "\n\n";
        }

        fclose($fo);

        return true;
    }

    /**
     * Unpack the values read from binary file
     * 
     * @param  string $header header read
     * @return array
     */
    public static function unpackValues($header)
    {
    	return [
    		'magicNumber'  => unpack('V', substr($header, 0, 4))[1],
    		'version'      => ord($header[4]),
            'timestamp'    => unpack('V', substr($header, 5, 4))[1],
            'previousHash' => bin2hex(substr($header, 9, Blockchain::HASH_LENGTH)),
            'blockHash'    => bin2hex(substr($header, 41, Blockchain::HASH_LENGTH)),
            'dataLength'   => unpack('V', substr($header, -4, 4))[1],
    	];
    }
}