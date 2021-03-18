<?php
declare(strict_types=1);

namespace RepCheck\Service\SubVersion\Github;

use RepCheck\Service\RemoteClient\RemoteClientAbstract;
use RepCheck\Service\RemoteClient\RemoteOption;
use RepCheck\Service\SubVersion\RepoClient\RepoClientInterface;


class GithubClient implements RepoClientInterface
{
    public const REPO_NAME = 'github';

    private $client;

    private $token;

    public function __construct(
        RemoteClientAbstract $client,
        string $token
    )
    {
        $this->client = $client;
        $this->token = $token;
        $this->init();
    }

    private function init()
    {
        $this->client->setOptions([
            new RemoteOption('Authorization', "token {$this->token}"),
            new RemoteOption('Accept', " application/vnd.github.v3+json")
        ]);

    }


    public function getLastHash($project, $branch):?string
    {
        $response = $this->client->get("/repos/$project/commits/$branch");

        if (!$response) {
            return null;
        }

        $decoded = json_decode($response,true);

        return $decoded['sha'] ?? null;
    }

}
