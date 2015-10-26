<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property string $nome
 * @property integer $pedido_id
 * @property string $descricao
 * @property string $tamanho
 * @property string $preco
 *
 * @property Pedido $pedido
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'pedido_id', 'tamanho'], 'required'],
            [['pedido_id'], 'integer'],
            [['preco'], 'number'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 255],
            [['tamanho'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nome' => 'Nome',
            'pedido_id' => 'Pedido ID',
            'descricao' => 'Descricao',
            'tamanho' => 'Tamanho',
            'preco' => 'Preco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['id' => 'pedido_id']);
    }
}
