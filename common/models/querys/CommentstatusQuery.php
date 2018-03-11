<?php

namespace common\models\querys;

/**
 * This is the ActiveQuery class for [[\common\models\Commentstatus]].
 *
 * @see \common\models\Commentstatus
 */
class CommentstatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Commentstatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Commentstatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
