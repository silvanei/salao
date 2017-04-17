<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170417174345 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $table = $schema->createTable('profissional');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('salao_id', 'integer');
        $table->addColumn('acesso_id', 'integer');
        $table->addColumn('nome', 'string');
        $table->addColumn('apelido', 'string', ['notnull' => false]);
        $table->addColumn('telefone', 'string', ['notnull' => false]);
        $table->addColumn('celular', 'string', ['notnull' => false]);
        $table->addColumn('deletado', 'boolean', ['notnull' => true, 'default' => false]);
        $table->setPrimaryKey(['id'], 'primary');
        $table->addForeignKeyConstraint('salao', ['salao_id'], ['id'], ["onUpdate" => "NO ACTION", "onDelete" => "NO ACTION"], 'fk_funcionario_salao');
        $table->addForeignKeyConstraint('acesso', ['acesso_id'], ['id'], ["onUpdate" => "NO ACTION", "onDelete" => "NO ACTION"], 'fk_funcionario_acesso');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $table = $schema->getTable('profissional');
        $table->removeForeignKey('fk_funcionario_salao');
        $table->removeForeignKey('fk_funcionario_acesso');
        $schema->dropTable('profissional');
    }
}
