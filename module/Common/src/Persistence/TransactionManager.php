<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 23/04/17
 * Time: 14:44
 */

namespace Common\Persistence;


interface TransactionManager
{

    /**
     * @return void
     */
    public function beginTransaction(): void;

    /**
     * @return void
     */
    public function commit(): void;

    /**
     * @return void
     */
    public function rollback(): void;
}