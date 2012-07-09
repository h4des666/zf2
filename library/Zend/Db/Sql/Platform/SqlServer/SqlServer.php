<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @package   Zend_Db
 */

namespace Zend\Db\Sql\Platform\SqlServer;

use Zend\Db\Sql\Platform\AbstractPlatform;

class SqlServer extends AbstractPlatform
{

    public function __construct(SelectDecorator $selectDecorator = null)
    {
        $this->setTypeDecorator('Zend\Db\Sql\Select', ($selectDecorator) ?: new SelectDecorator());
    }

}
