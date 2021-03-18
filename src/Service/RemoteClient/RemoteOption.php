<?php
declare(strict_types=1);

namespace RepCheck\Service\RemoteClient;

class RemoteOption
{
    private string $name;

    /**
     * @var mixed
     */
    private string $value;

    public function __construct(string $name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }



}
