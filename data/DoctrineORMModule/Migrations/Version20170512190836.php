<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170512190836 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {

        $table = $schema->createTable('horario_funcionamento');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('salao_id', 'integer');
        $table->addColumn('hora_inicio', 'time');
        $table->addColumn('hora_fim', 'time');
        $table->addColumn('segunda', 'boolean')->setDefault(false);
        $table->addColumn('terca', 'boolean')->setDefault(false);
        $table->addColumn('quarta', 'boolean')->setDefault(false);
        $table->addColumn('quinta', 'boolean')->setDefault(false);
        $table->addColumn('sexta', 'boolean')->setDefault(false);
        $table->addColumn('sabado', 'boolean')->setDefault(false);
        $table->addColumn('domingo', 'boolean')->setDefault(false);
        $table->setPrimaryKey(['id'], 'primary');
        $table->addIndex(['salao_id'], 'fk_horario_funcionamento_salao_id');
        $table->addForeignKeyConstraint('salao', ['salao_id'], ['id'], ["onUpdate" => "NO ACTION", "onDelete" => "NO ACTION"], 'fk_horario_funcionamento_salao');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $table = $schema->getTable('horario_funcionamento');
        $table->removeForeignKey('fk_horario_funcionamento_salao');
        $schema->dropTable('horario_funcionamento');

    }
}
