<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PedidoProduto;

/**
 * PedidoProdutoSearch represents the model behind the search form about `app\models\PedidoProduto`.
 */
class PedidoProdutoSearch extends PedidoProduto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pedido_codigo'], 'integer'],
            [['produto_desc_tam'], 'safe'],
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
        $query = PedidoProduto::find();

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
            'pedido_codigo' => $this->pedido_codigo,
        ]);

        $query->andFilterWhere(['like', 'produto_desc_tam', $this->produto_desc_tam]);

        return $dataProvider;
    }
}
