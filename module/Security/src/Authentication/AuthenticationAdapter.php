<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 05/05/2017
 * Time: 10:25
 */

namespace Security\Authentication;

use Doctrine\ORM\EntityManager;
use Salao\Entity\AcessoProfissional;
use Salao\Entity\Identity;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Adapter\Exception;
use Zend\Authentication\Result as AuthenticationResult;

/**
 * Class AuthenticationAdapter
 * @package Security\Authentication
 */
class AuthenticationAdapter extends AbstractAdapter
{

    /** @var  EntityManager */
    private $entityManager;

    /** @var null  */
    protected $authenticationResultInfo = null;

    /**
     * AuthenticationAdapter constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function authenticate()
    {

        $this->setup();

        /** @var AcessoProfissional $identity */
        $identity = $this->entityManager->createQueryBuilder()
            ->select('a')
            ->from(AcessoProfissional::class, 'a')
            ->innerJoin('a.profissional', 'p')
            ->where('a.email = :email', 'p.deletado = :deletado')
            ->setParameters(['email' => $this->identity, 'deletado' => false])
            ->getQuery()
            ->getOneOrNullResult()
        ;

        if (empty($identity)) {
            $this->authenticationResultInfo['code']       = AuthenticationResult::FAILURE_IDENTITY_NOT_FOUND;
            $this->authenticationResultInfo['messages'][] = 'A record with the supplied identity could not be found.';
            return $this->createAuthenticationResult();
        }

        $credentialValue = password_verify($this->credential, $identity->getSenha());
        if (!$credentialValue) {
            $this->authenticationResultInfo['code']       = AuthenticationResult::FAILURE_CREDENTIAL_INVALID;
            $this->authenticationResultInfo['messages'][] = 'Supplied credential is invalid.';
            return $this->createAuthenticationResult();
        }

        $identity = new Identity(
            $identity->getId(),
            $identity->getEmail(),
            $identity->getPerfil(),
            $identity->getProfissional()->getId(),
            $identity->getProfissional()->getSalao()->getId()

        );


        $this->authenticationResultInfo['code']       = AuthenticationResult::SUCCESS;
        $this->authenticationResultInfo['identity']   = $identity;
        $this->authenticationResultInfo['messages'][] = 'Authentication successful.';

        return $this->createAuthenticationResult();
    }

    /**
     * This method abstracts the steps involved with making sure that this adapter was
     * indeed setup properly with all required pieces of information.
     *
     * @throws Exception\RuntimeException - in the event that setup was not done properly
     */
    protected function setup()
    {
        if (null === $this->identity) {
            throw new Exception\RuntimeException(
                'A value for the identity was not provided prior to authentication with ObjectRepository '
                . 'authentication adapter'
            );
        }

        if (null === $this->credential) {
            throw new Exception\RuntimeException(
                'A credential value was not provided prior to authentication with ObjectRepository'
                . ' authentication adapter'
            );
        }

        $this->authenticationResultInfo = array(
            'code' => AuthenticationResult::FAILURE,
            'identity' => $this->identity,
            'messages' => array()
        );
    }

    /**
     * Creates a Zend\Authentication\Result object from the information that has been collected
     * during the authenticate() attempt.
     *
     * @return \Zend\Authentication\Result
     */
    protected function createAuthenticationResult()
    {
        return new AuthenticationResult(
            $this->authenticationResultInfo['code'],
            $this->authenticationResultInfo['identity'],
            $this->authenticationResultInfo['messages']
        );
    }
}