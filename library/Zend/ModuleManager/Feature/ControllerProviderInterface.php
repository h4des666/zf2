<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_ModuleManager
 * @subpackage Feature
 */

namespace Zend\ModuleManager\Feature;

/**
 * @category   Zend
 * @package    Zend_ModuleManager
 * @subpackage Feature
 */
interface ControllerProviderInterface
{
    /**
     * Expected to return \Zend\ServiceManager\Configuration object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Configuration
     */
    public function getControllerConfiguration();
}
