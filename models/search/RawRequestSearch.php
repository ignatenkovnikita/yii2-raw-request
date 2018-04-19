<?php
namespace ignatenkovnikita\request\models\search;

use ignatenkovnikita\request\models\RawRequest;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProviderAccessSearch represents the model behind the search form of `common\models\generated\models\RawRequest`.
 */
class RawRequestSearch extends RawRequest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['application_id', 'controller_id', 'action_id', 'raw'], 'safe'],
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
        $query = RawRequest::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'application_id', $this->application_id])
            ->andFilterWhere(['ilike', 'controller_id', $this->controller_id])
            ->andFilterWhere(['ilike', 'action_id', $this->action_id])
            ->andFilterWhere(['ilike', 'raw', $this->raw]);

        return $dataProvider;
    }
}

