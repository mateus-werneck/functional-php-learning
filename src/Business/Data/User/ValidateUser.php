<?php

namespace Business\Data\User;

use Lib\Functors\Maybe;
use stdClass;

function getUserName(stdClass $user): string  
{
    if (!$user->name) return 'Guest';
    
    return $user->name;
}

function getUserNameFunctional(stdClass $user): string 
{
    return Maybe::fromValue($user)
        ->map(fn($u) => $u->name)
        ->filter(fn($name) => $name !== null)
        ->getOrElse('Guest');    
}
