<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "commentstatus".
 *
 * @property int $id
 * @property string $name
 * @property int $position
 *
 * @property Comment[] $comments
 */
class Commentstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commentstatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'position'], 'required'],
            [['position'], 'integer'],
            [['name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'position' => 'Position',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['status' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\querys\CommentstatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\querys\CommentstatusQuery(get_called_class());
    }
}
