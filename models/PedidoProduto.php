<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido_produto".
 *
 * @property integer $id
 * @property integer $pedido_codigo
 * @property string $produto_desc_tam
 * @property string $produto_preco
 *
 * @property Pedido $pedidoCodigo
 * @property Produto $produtoDescTam
 */
class PedidoProduto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido_produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pedido_codigo', 'produto_desc_tam'], 'required'],
            [['pedido_codigo'], 'integer'],
            [['produto_preco'], 'number'],
            [['produto_desc_tam'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pedido_codigo' => 'Pedido Codigo',
            'produto_desc_tam' => 'Produto Desc Tam',
            'produto_preco' => 'Produto Preco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoCodigo()
    {
        return $this->hasOne(Pedido::className(), ['codigo' => 'pedido_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutoDescTam()
    {
        return $this->hasOne(Produto::className(), ['desc_tam' => 'produto_desc_tam', 'preco' => 'produto_preco']);
    }
}
