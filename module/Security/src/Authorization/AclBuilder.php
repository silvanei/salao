<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 01/05/17
 * Time: 19:49
 */

namespace Security\Authorization;

use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;
use Zend\Permissions\Acl\Role\GenericRole as Role;

class AclBuilder
{

    /**
     * @var array
     */
    private $acl;

    /**
     * Builder constructor.
     * @param $acl
     */
    public function __construct(array $acl)
    {
        $this->acl = $acl;
    }
    /**
     * @return Acl
     */
    public function build(): Acl
    {
        $acl = new Acl();
        foreach ($this->acl['roles'] as $role => $parent) {
            $acl->addRole(new Role($role), $parent);
        }
        foreach ($this->acl['resources'] as $r) {
            $acl->addResource(new Resource($r));
        }
        foreach ($this->acl['privilege'] as $role => $privilege) {
            if (isset($privilege['allow'])) {
                foreach ($privilege['allow'] as $p) {
                    $acl->allow($role, $p);
                }
            }
            if (isset($privilege['deny'])) {
                foreach ($privilege['deny'] as $p) {
                    $acl->deny($role, $p);
                }
            }
        }
        return $acl;
    }
}