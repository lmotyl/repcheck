<?php
declare(strict_types=1);

namespace RepCheck\Builder;

use RepCheck\Service\RemoteClient\RemoteClientAbstract;
use RepCheck\Service\SubVersion\Github\GithubClient;

class RepoClientBuilder
{

    public static function getRepoClient($repoName, RemoteClientAbstract $client)
    {
        switch ($repoName) {
            case GithubClient::REPO_NAME:
                return new GithubClient($client, $_ENV['GITHUB_CLIENT_TOKEN']);

                break;
        }


    }


}
