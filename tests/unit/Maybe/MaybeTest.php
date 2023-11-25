<?php

namespace Tests\unit\Maybe;

use PHPUnit\Framework\TestCase;
use stdClass;

use function Business\Data\User\getUserName;
use function Business\Data\User\getUserNameFunctional;

class MaybeTest extends TestCase
{

    public function testUserName(): void
    {
        $user = new stdClass();
        $user->name = 'Mateus';

        $sut = getUserName($user);

        $this->assertEquals($sut, 'Mateus', 'Usuário Inválido.');
    }

    
    public function testUserNameFunctional(): void
    {
        $user = new stdClass();
        $user->name = 'Mateus';

        $sut = getUserNameFunctional($user);

        $this->assertEquals($sut, 'Mateus', 'Usuário Inválido.');

    }

    public function testGuestUserName(): void
    {
        $user = new stdClass();

        $sut = getUserName($user);

        $this->assertEquals($sut, 'Guest', 'Usuário Inválido.');
    }

    
    public function testGuestUserNameFunctional(): void
    {
        $user = new stdClass();

        $sut = getUserNameFunctional($user);

        $this->assertEquals($sut, 'Guest', 'Usuário Inválido.');

    }
}
