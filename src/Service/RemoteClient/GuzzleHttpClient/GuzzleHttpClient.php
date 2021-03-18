<?php
declare(strict_types=1);

namespace RepCheck\Service\RemoteClient\GuzzleHttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use RepCheck\Service\RemoteClient\RemoteClientAbstract;
use RepCheck\Service\RemoteClient\RemoteOption;

class GuzzleHttpClient extends RemoteClientAbstract
{

    /**
     * @var Client
     */
    private $client;

    private $baseUri;

    private $timeout;

    public function __construct(string $baseUri, int $timeout)
    {
        $this->baseUri = $baseUri;
        $this->timeout = $timeout;
        $this->init();
    }

    private function init()
    {
        $this->client = new Client([
            'base_uri' => $this->baseUri,
            'timeout'  => $this->timeout,
        ]);

    }

    private function buildHeaders():array
    {
        $out = [];

        foreach ($this->options as $option) {
            /** @var $option RemoteOption */
            $out[$option->getName()] = $option->getValue();
        }

        return $out;
    }

    public function setOptions(array $options):self
    {
        $this->options = $options;

        return $this;
    }


    public function get($query)
    {
        $headers = $this->buildHeaders();

        $response = $this->client->request('GET', $query, [
            'headers' => $headers
        ]);
//        $response->getBody();

        return $response->getBody()->getContents();
    }


}
