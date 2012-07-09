<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @package   Zend_Db
 */

namespace Zend\Db\Sql\Predicate;

use Zend\Db\Sql\Expression as BaseExpression;

/**
 * @category   Zend
 * @package    Zend_Db
 * @subpackage Sql
 */
class Expression extends BaseExpression implements PredicateInterface
{

    /**
     * Constructor
     *
     * @param string $expression
     * @param mixed $valueParameter
     * @return void
     */
    public function __construct($expression = null, $valueParameter = null /*[, $valueParameter, ... ]*/)
    {
        if ($expression) {
            $this->setExpression($expression);
        }

        if (is_array($valueParameter)) {
            $this->setParameters($valueParameter);
        } else {
            $argNum = func_num_args();
            if ($argNum > 2 || is_scalar($valueParameter)) {
                $parameters = array();
                for ($i = 1; $i < $argNum; $i++) {
                    $parameters[] = func_get_arg($i);
                }
                $this->setParameters($parameters);
            }
        }
    }

}
