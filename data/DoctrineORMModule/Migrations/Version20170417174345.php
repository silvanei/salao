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

        $table = $schema->createTable('acesso_profissional');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('email', 'string');
        $table->addColumn('senha', 'string');
        $table->addColumn('perfil', 'string');
        $table->addColumn('profissional_id', 'integer');
        $table->setPrimaryKey(['id'], 'primary');
        $table->addUniqueIndex(['email'], 'email_unique');
        $table->addIndex(['profissional_id'], 'profissional_salao_id');
        $table->addForeignKeyConstraint('profissional', ['profissional_id'], ['id'], ["onUpdate" => "NO ACTION", "onDelete" => "NO ACTION"], 'fk_acesso_profissional');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $table = $schema->getTable('acesso_profissional');
        $table->removeForeignKey('fk_acesso_profissional');
        $schema->dropTable('acesso_profissional');
    }
}
