<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTable extends AbstractMigration
{
    public function up()
    {
	$table1 = $this->table('trx_users');
	$table1->addColumn('user_name', 'string')
		->addColumn('password', 'string')
	       ->create();
	$table2 = $this->table('trx_comments');
	$table2->addColumn('user_id', 'integer')
	       ->addColumn('text', 'string')
	       ->create();
    }

    public function down()
    {
	$table1 = $this->table('trx_users');
        $table1->drop()
               ->save();
	$table2 = $this->table('trx_comments');
        $table2->drop()
               ->save();
    }
}
