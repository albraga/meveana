<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedido_produto".
 *
 * @property integer $id
 * @property integer $numero
 * @property string $desc_tam
 *
 * @property Pedido $numero0
 * @property Produto $descTam
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
            [['id', 'numero', 'desc_tam'], 'required'],
            [['id', 'numero'], 'integer'],
            [['desc_tam'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numero' => 'Numero',
            'desc_tam' => 'Desc Tam',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNumero0()
    {
        return $this->hasOne(Pedido::className(), ['numero' => 'numero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescTam()
    {
        return $this->hasOne(Produto::className(), ['desc_tam' => 'desc_tam']);
    }
}
