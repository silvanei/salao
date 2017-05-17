<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170417121647 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('salao');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('nome', 'string');
        $table->addColumn('visivel_no_app', 'boolean', ['notnull' => false, 'default' => false]);
        $table->addColumn('telefone', 'string');
        $table->addColumn('celular', 'string', ['notnull' => false]);
        $table->addColumn('image', 'string');
        $table->setPrimaryKey(['id'], 'primary');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $schema->dropTable('salao');
    }
}
