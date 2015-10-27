<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $numero
 * @property string $cliente_nometel
 * @property string $entregador
 * @property string $status
 *
 * @property Cliente $clienteNometel
 * @property Entregador $entregador0
 * @property Status $status0
 * @property PedidoProduto[] $pedidoProdutos
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
            [['cliente_nometel'], 'required'],
            [['cliente_nometel', 'entregador'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'numero' => 'Numero',
            'cliente_nometel' => 'Cliente Nometel',
            'entregador' => 'Entregador',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteNometel()
    {
        return $this->hasOne(Cliente::className(), ['nome_tel' => 'cliente_nometel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntregador0()
    {
        return $this->hasOne(Entregador::className(), ['nome' => 'entregador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Status::className(), ['status' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoProdutos()
    {
        return $this->hasMany(PedidoProduto::className(), ['numero' => 'numero']);
    }
}
