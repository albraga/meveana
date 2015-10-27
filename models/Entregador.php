<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entregador".
 *
 * @property string $nome
 * @property string $tercei_nome
 * @property integer $pedido_id
 * @property string $cpf
 * @property string $rg
 * @property string $celular
 *
 * @property Terceirizada $terceiNome
 * @property Pedido[] $pedidos
 */
class Entregador extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entregador';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'tercei_nome', 'pedido_id'], 'required'],
            [['pedido_id'], 'integer'],
            [['nome', 'tercei_nome'], 'string', 'max' => 50],
            [['cpf', 'rg'], 'string', 'max' => 18],
            [['celular'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nome' => 'Nome',
            'tercei_nome' => 'Tercei Nome',
            'pedido_id' => 'Pedido ID',
            'cpf' => 'Cpf',
            'rg' => 'Rg',
            'celular' => 'Celular',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerceiNome()
    {
        return $this->hasOne(Terceirizada::className(), ['nome' => 'tercei_nome']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['entregador' => 'nome']);
    }
}
