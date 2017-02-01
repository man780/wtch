<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "wt_ingredients".
 *
 * @property integer $id
 * @property string $ingname
 *
 * @property DishIng[] $dishIngs
 */
class Ingredients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wt_ingredients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ingname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ingname' => 'Ingname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishIngs()
    {
        return $this->hasMany(DishIng::className(), ['ing_id' => 'id']);
    }

    public function getDishes() {
        return $this->hasMany(Dishes::className(), ['id' => 'dish_id'])->viaTable('{{%dish_ing}}', ['ing_id' => 'id']);
    }


}
