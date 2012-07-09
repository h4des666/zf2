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
 * @package    Zend_Gdata
 * @subpackage Photos
 */

namespace Zend\GData\Photos\Extension;

/**
 * Represents the gphoto:commentingEnabled element used by the API.
 * This class represents whether commenting is enabled for a given
 * entry.
 *
 * @category   Zend
 * @package    Zend_Gdata
 * @subpackage Photos
 */
class CommentingEnabled extends \Zend\GData\Extension
{

    protected $_rootNamespace = 'gphoto';
    protected $_rootElement = 'commentingEnabled';

    /**
     * Constructs a new Zend_Gdata_Photos_Extension_CommentingEnabled object.
     *
     * @param string $text (optional) Whether commenting should be enabled
     *          or not.
     */
    public function __construct($text = null)
    {
        $this->registerAllNamespaces(\Zend\GData\Photos::$namespaces);
        parent::__construct();
        $this->setText($text);
    }

}
