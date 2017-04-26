<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: silvanei
 * Date: 25/04/17
 * Time: 22:06
 */

namespace Common\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\TextType;

final class PasswordType extends TextType
{

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'password';
    }

    /**
     * {@inheritdoc}
     *
     * @param string $value
     * @param AbstractPlatform $platform
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): string
    {
        return $value;
    }

    /**
     * {@inheritdoc}
     *
     * @param string|null $value
     * @param AbstractPlatform $platform
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        $password = password_hash($value, PASSWORD_DEFAULT);
        if($password === false) {
            throw new \InvalidArgumentException('Não foi possível gerar o has da senha');
        }

        return $password;
    }
}