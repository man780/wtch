<?php
/**
 * Created by PhpStorm.
 * User: 24
 * Date: 28.01.2017
 * Time: 12:22
 */

namespace app\models;
use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class FindForm extends Model
{
    public $ing_id;
    public $dishname;
    public $ingredients;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['ing_id'], 'required'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'ing_id' => 'Select ingredients',
        ];
    }

    public function getIngredientsAll()
    {
        return ArrayHelper::map(Ingredients::find()->all(), 'id', 'ingname');
    }
}