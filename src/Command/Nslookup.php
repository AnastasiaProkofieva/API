<?php
declare(strict_types=1);


namespace App\Command;


class Nslookup extends Command
{
    public function run(string $domain):array
    {
        $result= $this->execute("/usr/bin/nslookup $domain");
        $regex = '/^Address: (?!127)(\d+\.\d+\.\d+.\d+)/';
        $ip=[];
        foreach ($result as $output){
            if (preg_match($regex,$output)){
                $ip[]=$output;
            }
        }
        return $ip;
    }
}