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
 * @package    Zend_Service_Amazon
 * @subpackage Ec2
 */

namespace Zend\Service\Amazon\Ec2\Exception;

use Zend\Service\Amazon\Exception;

/**
 * @category   Zend
 * @package    Zend_Service_Amazon
 * @subpackage Ec2
 */
class RuntimeException extends Exception\RuntimeException implements ExceptionInterface
{
}
