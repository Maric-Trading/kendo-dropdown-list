<?php



namespace MaricTrading\KendoDropdownList;

use Symfony\Component\HttpKernel\Bundle\Bundle;


class KendoDropdownListBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
