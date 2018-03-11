<?php

namespace common\models\querys;

/**
 * This is the ActiveQuery class for [[\common\models\Adminuser]].
 *
 * @see \common\models\Adminuser
 */
class AdminuserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Adminuser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Adminuser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
