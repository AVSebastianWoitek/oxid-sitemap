<?php

namespace Ivoba\OxidSiteMap\Query;

/**
 * Class Categories
 * @package Ivoba\OxidSiteMap\Query
 */
class Categories extends AbstractQuery
{

    private $sql = "SELECT
                        oxid,
                        oxtitle,
                        oxdesc,
                        oxlongdesc,
                        oxstdurl,
                        oxseourl
                    FROM oxcategories AS categories
                    JOIN
                      oxseo AS seo 
                    ON
                      (seo.OXOBJECTID = categories.OXID)
                    WHERE
                        categories.oxactive = 1 AND
                        seo.oxstdurl NOT LIKE %s AND
                        categories.oxhidden = 0 %s 
                    ORDER by categories.oxtitle ASC";


    /**
     * @return string
     */
    public function getSql()
    {
        $this->sql = sprintf($this->sql, "('%pgNr=%')", $this->config->getLangQuery());
        return $this->sql;
    }

}