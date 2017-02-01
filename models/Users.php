<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sd_users".
 *
 * @property integer $id
 * @property string $login
 * @property string $pass
 * @property integer $is_active
 * @property integer $role
 * @property integer $id_unit
 * @property string $name
 * @property string $fname
 * @property string $oname
 * @property string $email
 * @property string $phone
 * @property integer $bycreated
 * @property integer $dcreated
 * @property integer $bymodified
 * @property integer $dmodified
 * @property integer $bydeleted
 * @property integer $ddeleted
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sd_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'pass', 'is_active', 'role', 'id_unit', 'name', 'fname', 'oname', 'email', 'phone', 'bycreated', 'dcreated', 'bymodified', 'dmodified', 'bydeleted', 'ddeleted'], 'required'],
            [['is_active', 'role', 'id_unit', 'bycreated', 'dcreated', 'bymodified', 'dmodified', 'bydeleted', 'ddeleted'], 'integer'],
            [['phone'], 'string'],
            [['login', 'name', 'fname', 'oname', 'email'], 'string', 'max' => 50],
            [['pass'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'pass' => 'Pass',
            'is_active' => 'Is Active',
            'role' => 'Role',
            'id_unit' => 'Id Unit',
            'name' => 'Name',
            'fname' => 'Fname',
            'oname' => 'Oname',
            'email' => 'Email',
            'phone' => 'Phone',
            'bycreated' => 'Bycreated',
            'dcreated' => 'Dcreated',
            'bymodified' => 'Bymodified',
            'dmodified' => 'Dmodified',
            'bydeleted' => 'Bydeleted',
            'ddeleted' => 'Ddeleted',
        ];
    }
}
