<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170416121647 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $endereco = $schema->createTable('endereco');
        $endereco->addColumn('id', 'integer', ['autoincrement' => true]);
        $endereco->addColumn('endereco', 'string')->setLength(80);
        $endereco->addColumn('lat', 'decimal')->setPrecision(10)->setScale(6);
        $endereco->addColumn('lng', 'decimal')->setPrecision(10)->setScale(6);
        $endereco->setPrimaryKey(['id'], 'primary');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('endereco');
    }
}
