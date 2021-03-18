<?php
declare(strict_types=1);

namespace RepCheck\Command;

use RepCheck\Builder\Builder;
use RepCheck\Service\Command\CommandOption;
use RepCheck\Service\SubVersion\Github\GithubClient;

class CheckCommand extends CommandAbstract
{

    public function __construct()
    {
        parent::__construct();

        $this->addOption(new CommandOption('service', 's', 'service', 'Git service. Default:github'));
    }


    protected function execute()
    {
        $arguments = $this->getArguments();
        $branch = array_pop($arguments);
        $repName = array_pop($arguments);
        $subversionControl = Builder::getSubVersionService(GithubClient::REPO_NAME);
        $lastHash = $subversionControl->getLastHash($repName, $branch);

        print_r($lastHash."\n");
    }


}
