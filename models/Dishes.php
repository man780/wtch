<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "wt_dishes".
 *
 * @property integer $id
 * @property string $dishname
 *
 * @property DishIng[] $dishIngs
 */
class Dishes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wt_dishes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dishname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dishname' => 'Dishname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDishIngs()
    {
        return $this->hasMany(DishIng::className(), ['dish_id' => 'id']);
    }

    public function getIngredients() {
        return $this->hasMany(Ingredients::className(), ['id' => 'ing_id'])->viaTable('{{%dish_ing}}', ['dish_id' => 'id']);
    }

    public function getIngredientsAll()
    {
        return ArrayHelper::map(Ingredients::find()->all(), 'id', 'ingname');
    }

}
