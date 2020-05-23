<?php
/**
 *  Класс списка ключевых слов для областей знаний
 *  Test for DK
 *  @author Eigin <sergei@eigin.net>
 *  @version 1.0
 */

namespace model;

use control\SqlBuild;


class Keywords_to_fields extends Base
{
    /**
     * установить имя таблицы для базовых функций работы с БД
     */
    function __construct ()
    {
        parent::__construct('vs_keywords_to_fields');
    }

    /**
     * удалить данные по двум ключам
     */
    public function delPos (array $param)
    {
        $str = $this->_sql_string
            ->delete ($this->_table_name)
            ->where  ('keyword_id', '=', $param['keyword_id'])
            ->where  ('field_id', '=', $param['field_id'])
            ->getSQL ();
        self::$_db->query($str) or die(mysqli_error(self::$_db));
        return true;
    }


}
