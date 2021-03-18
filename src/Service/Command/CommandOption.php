<?php
declare(strict_types=1);

namespace RepCheck\Service\Command;

class CommandOption
{
    private string $name;

    private string $short;

    private string $long;

    private string $description;

    private string $value;

    private bool $reguired;

    public function __construct(
        string $name,
        string $short,
        string $long,
        string $description,
        bool $reguired = false
    ) {
        $this->name = $name;
        $this->short = $short;
        $this->long = $long;
        $this->description = $description;
        $this->reguired = $reguired;
    }

    public function getShort(): string
    {
        return $this->short;
    }

    public function getLong(): string
    {
        return $this->long;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isReguired(): bool
    {
        return $this->reguired;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }


}
