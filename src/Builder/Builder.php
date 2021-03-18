<?php
declare(strict_types=1);

namespace RepCheck\Builder;

use RepCheck\Command\CheckCommand;

use RepCheck\Service\RemoteClient\GuzzleHttpClient\GuzzleHttpClient;
use RepCheck\Service\SubVersion\SubVersionService;

class Builder
{


    static public function getCheckCommand()
    {
        return new CheckCommand();
    }

    static public function getSubVersionService($repoName)
    {
        $repoClient = RepoClientBuilder::getRepoClient(
            $repoName,
            new GuzzleHttpClient(
                $_ENV['GITHUB_API_ENDPOINT'],
                (int) $_ENV['GITHUB_TIMEOUT']
            )
        );

        return new SubVersionService($repoClient);
    }

}
