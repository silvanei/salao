<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 08/06/2017
 * Time: 10:03
 */

namespace Salao\Infra\Repository;

use Doctrine\ORM\EntityRepository;
use Salao\Repository\ServicoRepositoryInterface;

class ServicoRepository extends EntityRepository implements ServicoRepositoryInterface
{

}