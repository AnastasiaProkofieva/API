<?php


namespace App\Command;


abstract class Command
{
    protected function execute(string $command): array
    {
        $output = [];
        exec(escapeshellcmd($command), $output);
        return $output;
    }

    abstract public function run(string $domain): array;
}