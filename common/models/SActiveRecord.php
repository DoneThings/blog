<?php
/**
 * Created by PhpStorm.
 * User: zoudongxu
 * Date: 2018/3/11
 * Time: 下午9:26
 */

namespace common\models;


use yii\db\ActiveRecord;

class SActiveRecord extends ActiveRecord
{
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                if ($this->hasAttribute('create_time')) {
                    $this->create_time = time();
                }
                if ($this->hasAttribute('update_time')) {
                    $this->update_time = time();
                }
            } else {
                if ($this->hasAttribute('update_time')) {
                    $this->update_time = time();
                }
            }
        } else {
            return false;
        }
        return true;
    }
}