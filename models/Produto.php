<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property string $desc_tam
 * @property string $preco
 *
 * @property PedidoProduto[] $pedidoProdutos
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
            [['desc_tam'], 'required'],
            [['preco'], 'number'],
            [['desc_tam'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'desc_tam' => 'Desc Tam',
            'preco' => 'Preco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoProdutos()
    {
        return $this->hasMany(PedidoProduto::className(), ['produto_desc_tam' => 'desc_tam']);
    }
}
