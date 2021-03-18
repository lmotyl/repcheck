<?php
declare(strict_types=1);

namespace RepCheck\Command;

use RepCheck\Service\Command\CommandOption;

abstract class CommandAbstract
{
    /**
     * @var array|null
     */
    private $arguments;

    /**
     * @var CommandOption[]
     */
    private array $options;

    public function __construct()
    {
        $this->setArguments();
    }

    private function setArguments()
    {
        $args = $_SERVER['argv'];
        array_shift($args);
        $this->arguments = $args;
    }

    abstract protected function execute();

    final public function run()
    {
        $this->initOptions();
        $this->execute();
    }


    final public function getOptions()
    {
        return $this->options;
    }


    final public function getOption(string $name):?CommandOption
    {
        foreach ($this->getOptions() as $opt) {
            if ($name === $opt->getName()) {
                return $opt;
            }
        }

        return null;
    }

    final public function getArguments()
    {

        return $this->arguments;
    }

    /**
     * @param CommandOption $cOption
     *
     * @return $this
     */
    public function addOption(CommandOption $cOption): self
    {
        $this->options[] = $cOption;

        return $this;
    }

    private function initOptions()
    {
        if (empty($this->options)) {
            return;
        }

        $shortOption = '';
        $long  = [];
        foreach ($this->options as $cOption) {
            $shortOption  .= $cOption->getShort().':';
            $longOption = $cOption->getLong().':';

            if (false === $cOption->isReguired()) {
                $shortOption .= ':';
                $longOption .= ':';
            }
            $long[] = $longOption;
            $opts = getopt($shortOption, $long);

            $value = $opts[$cOption->getLong()] ?? null;

            if (is_null($value)) {
                $value = $opts[$cOption->getShort()] ?? null;
            }

            if (!is_null($value)) {
                $cOption->setValue($value);
            }
        }

    }

}
