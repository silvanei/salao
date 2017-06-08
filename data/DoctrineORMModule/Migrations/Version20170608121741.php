<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170608121741 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {

        $table = $schema->createTable('servico');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('salao_id', 'integer');
        $table->addColumn('descricao', 'string');
        $table->addColumn('duracao', 'integer', ['comment' => 'Duração em minutos']);
        $table->addColumn('valor', 'decimal')->setPrecision(17)->setScale(2);
        $table->addColumn('deletado', 'boolean', ['notnull' => true, 'default' => false]);
        $table->setPrimaryKey(['id'], 'primary');
        $table->addForeignKeyConstraint('salao', ['salao_id'], ['id'], ["onUpdate" => "NO ACTION", "onDelete" => "NO ACTION"], 'fk_servico_salao');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $table = $schema->getTable('servico');
        $table->removeForeignKey('fk_servico_salao');
        $schema->dropTable('servico');
    }
}
