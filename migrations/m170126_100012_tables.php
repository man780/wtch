<?php

use yii\db\Migration;
use yii\db\Schema;

class m170126_100012_tables extends Migration
{
    public function up()
    {

        $this->createTable('{{%dishes}}', [
            'id'        => Schema::TYPE_PK,
            'dishname'  => Schema::TYPE_STRING . '(255)',
        ]);

        $this->createIndex('id', '{{%dishes}}', 'id', true);

        $this->insert('{{%dishes}}', array(
            'dishname'=>'первый блюдо',
        ));
        $this->insert('{{%dishes}}', array(
            'dishname'=>'Второй блюдо',
        ));
        $this->insert('{{%dishes}}', array(
            'dishname'=>'блюдо 3',
        ));
        $this->insert('{{%dishes}}', array(
            'dishname'=>'блюдо 4',
        ));
        $this->insert('{{%dishes}}', array(
            'dishname'=>'Блюдо 5,0',
        ));
        $this->insert('{{%dishes}}', array(
            'dishname'=>'Блюдо 6',
        ));
        $this->insert('{{%dishes}}', array(
            'dishname'=>'блюдо 7',
        ));
        $this->insert('{{%dishes}}', array(
            'dishname'=>'Блюдо Eight',
        ));

        $this->createTable('{{%ingredients}}', [
            'id'        => Schema::TYPE_PK,
            'ingname'   => Schema::TYPE_STRING . '(255)',
        ]);

        $this->createIndex('id', '{{%ingredients}}', 'id', true);

        $this->insert('{{%ingredients}}', array(
            'ingname'=>'первый ингредиент',
        ));
        $this->insert('{{%ingredients}}', array(
            'ingname'=>'Второй ингредиент',
        ));
        $this->insert('{{%ingredients}}', array(
            'ingname'=>'ингредиент III',
        ));
        $this->insert('{{%ingredients}}', array(
            'ingname'=>'ингредиент 4',
        ));
        $this->insert('{{%ingredients}}', array(
            'ingname'=>'Ингредиент 5,0',
        ));
        $this->insert('{{%ingredients}}', array(
            'ingname'=>'Ингредиент VI',
        ));
        $this->insert('{{%ingredients}}', array(
            'ingname'=>'Ингредиент 7',
        ));
        $this->insert('{{%ingredients}}', array(
            'ingname'=>'Ингредиент Eight',
        ));
        $this->insert('{{%ingredients}}', array(
            'ingname'=>'Ингредиент 9',
        ));
        $this->insert('{{%ingredients}}', array(
            'ingname'=>'Ингредиент ten',
        ));
        $this->insert('{{%ingredients}}', array(
            'ingname'=>'Ингредиент Eleven',
        ));

        $this->createTable('{{%dish_ing}}', [
            'id'        => Schema::TYPE_PK,
            'dish_id'        => Schema::TYPE_INTEGER,
            'ing_id'        => Schema::TYPE_INTEGER,
        ]);

        $this->addForeignKey('fk_dish', '{{%dish_ing}}', 'dish_id', '{{%dishes}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk_ing', '{{%dish_ing}}', 'ing_id', '{{%ingredients}}', 'id', 'CASCADE', 'RESTRICT');

        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 1,
            'ing_id'=> 1,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 1,
            'ing_id'=> 3,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 1,
            'ing_id'=> 5,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 1,
            'ing_id'=> 10,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 1,
            'ing_id'=> 11,
        ));

        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 2,
            'ing_id'=> 2,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 2,
            'ing_id'=> 3,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 2,
            'ing_id'=> 5,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 2,
            'ing_id'=> 8,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 2,
            'ing_id'=> 9,
        ));

        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 3,
            'ing_id'=> 1,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 3,
            'ing_id'=> 2,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 3,
            'ing_id'=> 3,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 3,
            'ing_id'=> 6,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 3,
            'ing_id'=> 8,
        ));

        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 4,
            'ing_id'=> 1,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 4,
            'ing_id'=> 2,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 4,
            'ing_id'=> 6,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 4,
            'ing_id'=> 7,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 4,
            'ing_id'=> 9,
        ));

        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 5,
            'ing_id'=> 1,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 5,
            'ing_id'=> 3,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 5,
            'ing_id'=> 7,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 5,
            'ing_id'=> 8,
        ));
        $this->insert('{{%dish_ing}}', array(
            'dish_id'=> 5,
            'ing_id'=> 10,
        ));
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk_dish',
            '{{%dish_ing}}'
        );
        $this->dropForeignKey(
            'fk_ing',
            '{{%dish_ing}}'
        );
        $this->dropTable('{{%dishes}}');
        $this->dropTable('{{%ingredients}}');
        $this->dropTable('{{%dish_ing}}');
        /*echo "m170126_100012_tables cannot be reverted.\n";

        return false;*/
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
