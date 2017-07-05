<?php
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 04/07/17
 * Time: 21:29
 */

namespace DoctrineORMModule\Fixture;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineDataFixtureModule\ContainerAwareInterface;
use DoctrineDataFixtureModule\ContainerAwareTrait;
use Profissional\Entity\AcessoProfissional;
use Profissional\Entity\Profissional;
use Salao\Entity\Salao;
use Security\Authorization\Role;
use Site\Service\CadastroService;

class CadastroSalao implements FixtureInterface, ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $salao = new Salao();
        $salao->setNome('Salão');
        $salao->setTelefone('4136631727');

        $profissional = new Profissional();
        $profissional->setNome('Administrador');

        $acessoProfissional = new AcessoProfissional();
        $acessoProfissional->setEmail('ads.silvanei@gmail.com');
        $acessoProfissional->setSenha('102030');
        $acessoProfissional->setProfissional($profissional);
        $acessoProfissional->setPerfil(Role::SALAO_ADMIN);

        /** @var CadastroService $cadastroService */
        $cadastroService = $this->container->get(CadastroService::class);
        $cadastroService->cadastrarSalao($salao, $acessoProfissional);
    }
}