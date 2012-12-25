<?php
/**
 * @copyright	Copyright 2006-2013, Miles Johnson - http://milesj.me
 * @license		http://opensource.org/licenses/mit-license.php - Licensed under the MIT License
 * @link		http://milesj.me/code/php/transit
 */

namespace mjohnson\transit\transporters\aws;

use mjohnson\transit\transporters\AbstractTransporter;
use \InvalidArgumentException;

/**
 * Base class for all AWS transporters to extend.
 *
 * @package	mjohnson.transit.transporters.aws
 */
abstract class AbstractAwsTransporter extends AbstractTransporter {

	/**
	 * Client instance.
	 *
	 * @access protected
	 * @var object
	 */
	protected $_client;

	/**
	 * Instantiate an AWS client object.
	 *
	 * @access public
	 * @param string $accessKey
	 * @param string $secretKey
	 * @param array $config
	 * @throws \InvalidArgumentException
	 */
	public function __construct($accessKey, $secretKey, array $config = array()) {
		if (empty($config['region'])) {
			throw new InvalidArgumentException('Please provide an AWS region');
		}

		$config['key'] = $accessKey;
		$config['secret'] = $secretKey;

		parent::__construct($config);
	}

}