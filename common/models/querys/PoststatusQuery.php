<?php

namespace common\models\querys;

/**
 * This is the ActiveQuery class for [[\common\models\Poststatus]].
 *
 * @see \common\models\Poststatus
 */
class PoststatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Poststatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Poststatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
