<?php
/**
 * Created by Geliyoo.
 * User: geliyoo
 * Date: 08/10/2017
 * Time: 15:23
 */

abstract class BaseEntity extends ObjectModel
{

    /**
     * @return mixed
     */
    public function getTableName()
    {
        return _DB_PREFIX_ . $this->def['table'];
    }

}