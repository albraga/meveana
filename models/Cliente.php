<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property string $nome
 * @property string $telefone
 * @property string $endereco
 * @property string $pontoref
 * @property string $datanasc
 *
 * @property Pedido[] $pedidos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'telefone', 'endereco'], 'required'],
            [['datanasc'], 'safe'],
            [['nome'], 'string', 'max' => 50],
            [['telefone'], 'string', 'max' => 20],
            [['endereco', 'pontoref'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nome' => 'Nome',
            'telefone' => 'Telefone',
            'endereco' => 'Endereco',
            'pontoref' => 'Pontoref',
            'datanasc' => 'Datanasc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['cliente_nome' => 'nome', 'cliente_tel' => 'telefone']);
    }
}
