<?php
declare(strict_types=1);

namespace RepCheck\Service\RemoteClient;

abstract class RemoteClientAbstract
{
    protected $options;

    /**
     * @param RemoteOption[]
     *
     * @return self
     */
    abstract function setOptions(array $options): self;

    abstract function get($query);


}
