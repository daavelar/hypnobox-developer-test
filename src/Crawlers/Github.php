<?php

namespace App\Crawlers;


use App\Exceptions\NotFoundRepositoryException;
use Github\Client;
use Github\Exception\RuntimeException;

class Github
{
    private $client;

    /**
     * Github class constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * List repositories of specified user on github
     *
     * @param $name
     */
    public function listRepositories($name)
    {
        $repositories = $this->client->api('user')->repositories($name);
        $items = [];

        foreach($repositories as $i => $repository) {
            $items[$i]['name'] = $repository['name'];
            $items[$i]['description'] = $repository['description'];
        }

        return $items;
    }

}