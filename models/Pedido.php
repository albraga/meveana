<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $id
 * @property string $cliente_nome
 * @property string $cliente_tel
 * @property integer $quantidade
 *
 * @property Entregador[] $entregadors
 * @property Cliente $clienteNome
 * @property Produto[] $produtos
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cliente_nome', 'cliente_tel', 'quantidade'], 'required'],
            [['id', 'quantidade'], 'integer'],
            [['cliente_nome'], 'string', 'max' => 50],
            [['cliente_tel'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cliente_nome' => 'Cliente Nome',
            'cliente_tel' => 'Cliente Tel',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntregadors()
    {
        return $this->hasMany(Entregador::className(), ['pedido_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteNome()
    {
        return $this->hasOne(Cliente::className(), ['nome' => 'cliente_nome', 'telefone' => 'cliente_tel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['pedido_id' => 'id']);
    }
}
