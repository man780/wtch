<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wt_dish_ing".
 *
 * @property integer $id
 * @property integer $dish_id
 * @property integer $ing_id
 *
 * @property Ingredients $ing
 * @property Dishes $dish
 */
class DishIng extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wt_dish_ing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dish_id', 'ing_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dish_id' => 'Dish ID',
            'ing_id' => 'Ing ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIng()
    {
        return $this->hasOne(Ingredients::className(), ['id' => 'ing_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDish()
    {
        return $this->hasOne(Dishes::className(), ['id' => 'dish_id']);
    }
}
