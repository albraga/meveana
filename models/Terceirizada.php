<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "terceirizada".
 *
 * @property string $nome
 * @property string $cnpj
 * @property string $endereco
 * @property string $telefone
 * @property string $email
 *
 * @property Entregador[] $entregadors
 */
class Terceirizada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'terceirizada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 50],
            [['cnpj'], 'string', 'max' => 18],
            [['endereco'], 'string', 'max' => 255],
            [['telefone', 'email'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nome' => 'Nome',
            'cnpj' => 'Cnpj',
            'endereco' => 'Endereco',
            'telefone' => 'Telefone',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntregadors()
    {
        return $this->hasMany(Entregador::className(), ['tercei_nome' => 'nome']);
    }
}
