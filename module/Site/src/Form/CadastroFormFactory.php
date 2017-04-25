<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 18/04/17
 * Time: 21:10
 */

namespace Site\Form;


use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Salao\Entity\Acesso;
use Zend\Form\FormInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class CadastroFormFactory implements FactoryInterface
{


    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) : FormInterface
    {

        /** @var EntityManager $entityManager */
        $entityManager = $container->get('doctrine.entitymanager.orm_default');

        $form = new CadastroForm('registroForm');
        $form->setInputFilter(new CadastroInputFilter($entityManager->getRepository(Acesso::class)));

        return $form;
    }
}