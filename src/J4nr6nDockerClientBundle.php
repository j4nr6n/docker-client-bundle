<?php

namespace j4nr6n\DockerClientBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class J4nr6nDockerClientBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
