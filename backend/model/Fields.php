<?php
/**
 *  Класс Области знаний
 *  Test for DK
 *  @author Eigin <sergei@eigin.net>
 *  @version 1.0
 */

namespace model;

use control\SqlBuild;


class Fields extends Base
{
    /**
     * установить имя таблицы для базовых функций работы с БД
     */
    function __construct ()
    {
        parent::__construct('vs_fields');
    }


    public function getKeywords (array $param)
    {
        $str = 'SELECT keyword_id, name FROM vs_keywords_to_fields
        JOIN vs_keywords ON vs_keywords_to_fields.keyword_id = vs_keywords.id
        WHERE field_id='.$param['field_id'];
        return $this->__getResult($str);
    }



}
