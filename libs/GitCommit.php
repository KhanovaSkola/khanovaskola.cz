<?php

class Git extends Nette\Object
{

    public static function getCommit()
    {
        $hash = @shell_exec('git rev-parse HEAD');
        return trim($hash);
    }



    public static function getBranch()
    {
        $branch = @shell_exec('echo $(git branch | grep "*" | sed "s/* //")');
        return trim($branch);
    }

}
