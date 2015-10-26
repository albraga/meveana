<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produto;

/**
 * ProdutoSearch represents the model behind the search form about `app\models\Produto`.
 */
class ProdutoSearch extends Produto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'tamanho'], 'safe'],
            [['pedido_id'], 'integer'],
            [['preco'], 'number'],
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
        $query = Produto::find();

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
            'preco' => $this->preco,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'tamanho', $this->tamanho]);

        return $dataProvider;
    }
}
