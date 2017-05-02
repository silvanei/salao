<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 01/05/17
 * Time: 19:41
 */

namespace Security\Authorization;

/**
 * Class Role
 * @package Security\Authorization
 */
final class Role
{

    const RESOURCE_FORMAT = '%s::%s';
    const USER_ROLE_PARAN = 'user_role_paran';

    const GUEST = 'CONVIDADO';
    const SALAO_ADMIN = 'SALAO_ADMIN';
    const SALAO_PROFISSIONAL = 'SALAO_PROFISSIONAL';
    const CLIENTE = 'CLIENTE';
}