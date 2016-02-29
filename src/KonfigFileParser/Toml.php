<?php

namespace Exen\Konfig\KonfigFileParser;

use Exen\Konfig\Exception\ParseException;
use Yosymfony\Toml\Toml as TomlLib;

class Toml implements IKonfigFileParser
{
    /**
     * {@inheritDoc}
     * Loads a TOML file as an array
     *
     * @throws ParseException If there is an error parsing TOML file
     */
    public function parse($path)
    {
        try {
            $data = TomlLib::Parse($path);
        } catch (Exception $ex) {
            throw new ParseException(
                array(
                    'message' => 'Error parsing TOML file',
                    'exception' => $ex,
                )
            );
        }

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function getSupportedFileExtensions()
    {
        return ['toml'];
    }
}

#: END OF ./KonfigFileParser/Toml.php FILE