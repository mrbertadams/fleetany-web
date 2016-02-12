<?php

use App\User;

class UserTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testUser()
    {
        $this->be(User::find(1));

        $this->visit('/user/create')
            ->type('Nome Usuario Teste', 'name')
            ->type('email@usuario.com', 'email')
            ->type('123456', 'password')
            ->type('Contato Usuario Teste', 'contact_id')
            ->type('Empresa Usuario Teste', 'company_id')
            ->press('Enviar')
            ->seePageIs('/user')
        ;
        
        $this->seeInDatabase('users', ['name' => 'Nome Usuario Teste', 'email' => 'email@usuario.com']);
        
        
        $this->click('Nome Usuario Teste')
            ->type('Nome Usuario Editado', 'name')
            ->type('emaileditado@usuario.com', 'email')
            ->type('654321', 'password')
            ->type('Contato Usuario Editado', 'contact_id')
            ->type('Empresa Usuario Editado', 'company_id')
            ->press('Enviar')
        ;

        $this->seeInDatabase('users', ['name' => 'Nome Usuario Editado', 'email' => 'emaileditado@usuario.com']);

    }
}
