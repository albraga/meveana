<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Entregador;

/**
 * EntregadorSearch represents the model behind the search form about `app\models\Entregador`.
 */
class EntregadorSearch extends Entregador
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'tercei_nome', 'cpf', 'rg', 'celular'], 'safe'],
            [['pedido_id'], 'integer'],
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
        $query = Entregador::find();

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
            'pedido_id' => $this->pedido_id,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'tercei_nome', $this->tercei_nome])
            ->andFilterWhere(['like', 'cpf', $this->cpf])
            ->andFilterWhere(['like', 'rg', $this->rg])
            ->andFilterWhere(['like', 'celular', $this->celular]);

        return $dataProvider;
    }
}
