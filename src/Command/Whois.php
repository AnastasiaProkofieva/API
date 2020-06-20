<?php


namespace App\Command;


class Whois extends Command
{
    public function run(string $domain):array
    {
        return $this->execute(sprintf('/usr/bin/whois %s', $domain));
    }
}