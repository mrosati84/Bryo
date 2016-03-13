<?php

namespace Bryo\Http\Controllers;

use Laravel\Lumen\Application;
use Laravel\Lumen\Routing\Controller as BaseController;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Parser as ConfigParser;
use Illuminate\Http\Request;
use MongoDB\Database;

class Controller extends BaseController
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var object
     */
    protected $structure;

    /**
     * @var Database
     */
    protected $db;

    /**
     * @var Application
     */
    protected $app;

    public function __construct(
        Application $app,
        Request $request,
        ConfigParser $configParser,
        Database $db
    )
    {
        $this->app = $app;

        $this->request = $request;

        $this->db = $db;

        // Parse the configuration file.
        try {
            $this->structure = $configParser->parse(
                file_get_contents(__DIR__.'/../../../../user/config/structure.yml'),
                FALSE, // $exceptionOnInvalidType
                FALSE, // $objectSupport
                FALSE // $objectForMap
            );
        } catch (ParseException $e) {
            // Error reading configuration file.
        }
    }

    /**
     * Check if a type is defined in structure configuration
     * and also has a corresponding database collection.
     * In case a database collection does not exist, we will
     * create it.
     *
     * @param string $type
     *   The type/collection we are looking for.
     *
     * @return bool
     *   TRUE in case collection is found/created. FALSE otherwise.
     */
    protected function isValidCollection($type) {
        // First check if this type is defined in structure config
        foreach ($this->structure as $configTypeKey => $configType) {
            if ($type === $configTypeKey) {
                // This type has been found on configuration.
                // Now we have to check if this type is also a
                // collection in database.
                foreach ($this->db->listCollections() as $collection) {
                    if ($type === $collection->getName()) {
                        return TRUE;
                    }
                }

                // Collection not found in database, create it.
                $this->db->createCollection($type);
                return TRUE;
            }
        }

        // This type has not been found in configuration.
        return FALSE;
    }
}
