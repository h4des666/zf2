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
 * @package    Zend_EventManager
 */

namespace Zend\EventManager\Filter;

use Zend\EventManager\ResponseCollection;
use Zend\Stdlib\CallbackHandler;

/**
 * Interface for intercepting filter chains
 *
 * @category   Zend
 * @package    Zend_EventManager
 */
interface FilterInterface
{
    /**
     * Execute the filter chain
     * 
     * @param  string|object $context 
     * @param  array $params 
     * @return mixed
     */
    public function run($context, array $params = array());

    /**
     * Attach an intercepting filter
     * 
     * @param  callback $callback 
     * @return CallbackHandler
     */
    public function attach($callback);

    /**
     * Detach an intercepting filter
     * 
     * @param  CallbackHandler $filter 
     * @return bool
     */
    public function detach(CallbackHandler $filter);

    /**
     * Get all intercepting filters
     * 
     * @return array
     */
    public function getFilters();

    /**
     * Clear all filters
     * 
     * @return void
     */
    public function clearFilters();

    /**
     * Get all filter responses
     * 
     * @return ResponseCollection
     */
    public function getResponses();
}
