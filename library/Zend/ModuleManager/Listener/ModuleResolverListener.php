<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @package   Zend_ModuleManager
 */

namespace Zend\ModuleManager\Listener;

/**
 * Module resolver listener
 * 
 * @category   Zend
 * @package    Zend_ModuleManager
 * @subpackage Listener
 */
class ModuleResolverListener extends AbstractListener
{
    /**
     * @param  \Zend\EventManager\EventInterface $e
     * @return object
     */
    public function __invoke($e)
    {
        $moduleName = $e->getModuleName();
        $class      = $moduleName . '\Module';

        if (!class_exists($class)) {
            return false;
        }

        $module = new $class;
        return $module;
    }
}
