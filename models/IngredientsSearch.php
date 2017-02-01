<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ingredients;

/**
 * IngredientsSearch represents the model behind the search form about `app\models\Ingredients`.
 */
class IngredientsSearch extends Ingredients
{
    /**
     * @inheritdoc
     */
    // public dish_id;
    public $dishname;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['ingname', 'dishname'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Ingredients::find()->innerJoinWith('dishes', true);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['attributes' => ['id', 'ingname'/*, 'dishname'*/]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'ingname', $this->ingname]);
        //$query->andFilterWhere(['like', 'dishname', $this->dishname]);

        return $dataProvider;
    }
}
