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
        $salao = $schema->createTable('salao');
        $salao->addColumn('id', 'integer', ['autoincrement' => true]);
        $salao->addColumn('nome', 'string');
        $salao->addColumn('visivel_no_app', 'boolean', ['notnull' => false, 'default' => false]);
        $salao->addColumn('telefone', 'string');
        $salao->addColumn('celular', 'string', ['notnull' => false]);
        $salao->addColumn('image', 'string');
        $salao->addColumn('endereco_id', 'integer', ['notnull' => false]);
        $salao->setPrimaryKey(['id'], 'primary');
        $salao->addForeignKeyConstraint('endereco', ['endereco_id'], ['id'], ["onUpdate" => "NO ACTION", "onDelete" => "NO ACTION"], 'fk_salao_endereco');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $salao = $schema->getTable('salao');
        $salao->removeForeignKey('fk_salao_endereco');
        $schema->dropTable('salao');
    }
}
