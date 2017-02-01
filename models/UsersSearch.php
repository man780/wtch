<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Users;

/**
 * UsersSearch represents the model behind the search form about `app\models\Users`.
 */
class UsersSearch extends Users
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_active', 'role', 'id_unit', 'bycreated', 'dcreated', 'bymodified', 'dmodified', 'bydeleted', 'ddeleted'], 'integer'],
            [['login', 'pass', 'name', 'fname', 'oname', 'email', 'phone'], 'safe'],
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
        $query = Users::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'is_active' => $this->is_active,
            'role' => $this->role,
            'id_unit' => $this->id_unit,
            'bycreated' => $this->bycreated,
            'dcreated' => $this->dcreated,
            'bymodified' => $this->bymodified,
            'dmodified' => $this->dmodified,
            'bydeleted' => $this->bydeleted,
            'ddeleted' => $this->ddeleted,
        ]);

        $query->andFilterWhere(['like', 'login', $this->login])
            ->andFilterWhere(['like', 'pass', $this->pass])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'oname', $this->oname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
