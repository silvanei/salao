<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170730174842 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {

        $table = $schema->createTable('profissional_presta_servico');
        $table->addColumn('servico_id', 'integer');
        $table->addColumn('profissional_id', 'integer');
        $table->setPrimaryKey(['servico_id','profissional_id'], 'primary');
        $table->addForeignKeyConstraint('servico', ['servico_id'], ['id'], ["onUpdate" => "NO ACTION", "onDelete" => "NO ACTION"], 'fk_funcionario_presta_servico_servico1');
        $table->addForeignKeyConstraint('profissional', ['profissional_id'], ['id'], ["onUpdate" => "NO ACTION", "onDelete" => "NO ACTION"], 'fk_funcionario_presta_servico_funcionario1');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $table = $schema->getTable('profissional_presta_servico');
        $table->removeForeignKey('fk_funcionario_presta_servico_servico1');
        $table->removeForeignKey('fk_funcionario_presta_servico_funcionario1');
        $schema->dropTable('profissional_presta_servico');

    }
}
