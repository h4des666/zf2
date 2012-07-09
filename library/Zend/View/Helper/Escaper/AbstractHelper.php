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
 * @package    Zend_View
 * @subpackage Helper
 */

namespace Zend\View\Helper\Escaper;

use Zend\View\Helper;
use Zend\View\Exception;
use Zend\Escaper;

/**
 * Helper for escaping values
 *
 * @package    Zend_View
 * @subpackage Helper
 */
abstract class AbstractHelper extends Helper\AbstractHelper
{

    /**@+
     * @const Recursion constants
     */
    const RECURSE_NONE   = 0x00;
    const RECURSE_ARRAY  = 0x01;
    const RECURSE_OBJECT = 0x02;
    /**@-*/

    /**
     * @var Escaper\Escaper
     */
    protected $escaper = null;

    /**
     * @var string Encoding
     */
    protected $encoding = 'UTF-8';

    public function setEscaper(Escaper\Escaper $escaper)
    {
        $this->escaper = $escaper;
        $this->encoding = $escaper->getEncoding();
        return $this;
    }

    public function getEscaper()
    {
        if (null === $this->escaper) {
            $this->setEscaper(new Escaper\Escaper($this->getEncoding()));
        }
        return $this->escaper;
    }

    /**
     * Set the encoding to use for escape operations
     * 
     * @param  string $encoding 
     * @return AbstractEscaper
     */
    public function setEncoding($encoding)
    {
        if (!is_null($this->escaper)) {
            throw new Exception\InvalidArgumentException(
                'Character encoding settings cannot be changed once the Helper has been used or '
                . ' if a Zend\Escaper\Escaper object (with preset encoding option) is set.'
            );
        }
        $this->encoding = $encoding;
        return $this;
    }

    /**
     * Get the encoding to use for escape operations
     * 
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Invoke this helper: escape a value
     * 
     * @param  mixed $value 
     * @param  int $recurse Expects one of the recursion constants; used to decide whether or not to recurse the given value when escaping
     * @return mixed Given a scalar, a scalar value is returned. Given an object, with the $recurse flag not allowing object recursion, returns a string. Otherwise, returns an array.
     * @throws Exception\InvalidArgumentException
     */
    public function __invoke($value, $recurse = self::RECURSE_NONE)
    {
        if (is_string($value)) {
            return $this->escape($value);
        }
        if (is_array($value)) {
            if (!(self::RECURSE_ARRAY & $recurse)) {
                throw new Exception\InvalidArgumentException(
                    'Array provided to Escape helper, but flags do not allow recursion'
                );
            }
            foreach ($value as $k => $v) {
                $value[$k] = $this->__invoke($v, $recurse);
            }
            return $value;
        }
        if (is_object($value)) {
            if (!(self::RECURSE_OBJECT & $recurse)) {
                // Attempt to cast it to a string
                if (method_exists($value, '__toString')) {
                    return $this->escape((string) $value);
                }
                throw new Exception\InvalidArgumentException(
                    'Object provided to Escape helper, but flags do not allow recursion'
                );
            }
            if (method_exists($value, 'toArray')) {
                return $this->__invoke($value->toArray(), $recurse | self::RECURSE_ARRAY);
            }
            return $this->__invoke((array) $value, $recurse | self::RECURSE_ARRAY);
        }
        // At this point, we have a scalar; simply return it
        return $value;
    }

    /**
     * Escape a value for current escaping strategy
     *
     * @param string $value
     * @return string
     */
    protected abstract function escape($value);

}
