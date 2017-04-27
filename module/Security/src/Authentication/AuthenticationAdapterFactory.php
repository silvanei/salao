<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 26/04/17
 * Time: 21:49
 */

namespace Security\Authentication;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Authentication\Adapter\ObjectRepository;
use Interop\Container\ContainerInterface;
use Salao\Entity\Acesso;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class AuthenticationAdapterFactory
 * @package Security\Authentication
 */
final class AuthenticationAdapterFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AbstractAdapter
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AbstractAdapter
    {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $acessoRepository = $entityManager->getRepository(Acesso::class);

        return new ObjectRepository([
            'objectManager' => $entityManager,
            'objectRepository' => $acessoRepository,
            'identityProperty' => 'email', // optional, default shown
            'credentialProperty' => 'senha',  // optional, default shown,
            'credentialCallable' => function ($identity, $credential) { // optional callable
                return password_verify($credential, $identity->getSenha());
            }
        ]);
    }
}