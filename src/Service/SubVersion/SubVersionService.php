<?php
declare(strict_types=1);

namespace RepCheck\Service\SubVersion;




use RepCheck\Service\SubVersion\RepoClient\RepoClientInterface;

class SubVersionService
{

    /**
     * @var RepoClientInterface
     */
    private $repoClient;

    public function __construct(
        RepoClientInterface $repoClient
    ) {
        $this->repoClient = $repoClient;
    }


    public function getLastHash(string $project,string $branch):?string
    {
        return $this->repoClient->getLastHash($project, $branch);
    }
}
