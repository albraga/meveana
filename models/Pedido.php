<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $codigo
 * @property string $cliente_nome
 * @property string $cliente_tel
 * @property string $entregador
 * @property string $situacao_status
 *
 * @property Cliente $clienteNome
 * @property Entregador $entregador0
 * @property Situacao $situacaoStatus
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
            [['cliente_nome', 'cliente_tel', 'situacao_status'], 'required'],
            [['cliente_nome', 'entregador'], 'string', 'max' => 50],
            [['cliente_tel'], 'string', 'max' => 20],
            [['situacao_status'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'cliente_nome' => 'Cliente Nome',
            'cliente_tel' => 'Cliente Tel',
            'entregador' => 'Entregador',
            'situacao_status' => 'Situacao Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteNome()
    {
        return $this->hasOne(Cliente::className(), ['nome' => 'cliente_nome', 'tel' => 'cliente_tel']);
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
    public function getSituacaoStatus()
    {
        return $this->hasOne(Situacao::className(), ['status' => 'situacao_status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoProdutos()
    {
        return $this->hasMany(PedidoProduto::className(), ['pedido_codigo' => 'codigo']);
    }
}
