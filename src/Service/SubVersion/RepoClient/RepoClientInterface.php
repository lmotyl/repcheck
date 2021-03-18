<?php

namespace RepCheck\Service\SubVersion\RepoClient;

interface RepoClientInterface {

    public function getLastHash($project, $branch):?string;
}
