<?php
/**
 * wallee SDK
 *
 * This library allows to interact with the wallee payment service.
 * wallee SDK: 1.0.0
 * 
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Wallee\Sdk\Model;

use Wallee\Sdk\ValidationException;

/**
 * PaymentMethodBrand model
 *
 * @category    Class
 * @description 
 * @package     Wallee\Sdk
 * @author      customweb GmbH
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 */
class PaymentMethodBrand  {

	/**
	 * The original name of the model.
	 *
	 * @var string
	 */
	private static $swaggerModelName = 'PaymentMethodBrand';

	/**
	 * An array of property to type mappings. Used for (de)serialization.
	 *
	 * @var string[]
	 */
	private static $swaggerTypes = array(
		'description' => 'map[string,string]',
		'grayImagePath' => 'string',
		'id' => 'int',
		'imagePath' => 'string',
		'name' => 'map[string,string]',
		'paymentMethod' => 'int'	);

	/**
	 * Returns an array of property to type mappings.
	 *
	 * @return string[]
	 */
	public static function swaggerTypes() {
		return self::$swaggerTypes;
	}

	

	/**
	 * 
	 *
	 * @var map[string,string]
	 */
	private $description;

	/**
	 * 
	 *
	 * @var string
	 */
	private $grayImagePath;

	/**
	 * The ID is the primary key of the entity. The ID identifies the entity uniquely.
	 *
	 * @var int
	 */
	private $id;

	/**
	 * 
	 *
	 * @var string
	 */
	private $imagePath;

	/**
	 * 
	 *
	 * @var map[string,string]
	 */
	private $name;

	/**
	 * 
	 *
	 * @var int
	 */
	private $paymentMethod;


	/**
	 * Constructor.
	 *
	 * @param mixed[] $data an associated array of property values initializing the model
	 */
	public function __construct(array $data = null) {
		if (isset($data['description'])) {
			$this->setDescription($data['description']);
		}
		if (isset($data['name'])) {
			$this->setName($data['name']);
		}
	}


	/**
	 * Returns description.
	 *
	 * 
	 *
	 * @return map[string,string]
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets description.
	 *
	 * @param map[string,string] $description
	 * @return PaymentMethodBrand
	 */
	public function setDescription($description) {
		if (is_array($description) && empty($description)) {
			$this->description = new \stdClass;
		} else {
			$this->description = $description;
		}

		return $this;
	}

	/**
	 * Returns grayImagePath.
	 *
	 * 
	 *
	 * @return string
	 */
	public function getGrayImagePath() {
		return $this->grayImagePath;
	}

	/**
	 * Sets grayImagePath.
	 *
	 * @param string $grayImagePath
	 * @return PaymentMethodBrand
	 */
	protected function setGrayImagePath($grayImagePath) {
		$this->grayImagePath = $grayImagePath;

		return $this;
	}

	/**
	 * Returns id.
	 *
	 * The ID is the primary key of the entity. The ID identifies the entity uniquely.
	 *
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Sets id.
	 *
	 * @param int $id
	 * @return PaymentMethodBrand
	 */
	protected function setId($id) {
		$this->id = $id;

		return $this;
	}

	/**
	 * Returns imagePath.
	 *
	 * 
	 *
	 * @return string
	 */
	public function getImagePath() {
		return $this->imagePath;
	}

	/**
	 * Sets imagePath.
	 *
	 * @param string $imagePath
	 * @return PaymentMethodBrand
	 */
	protected function setImagePath($imagePath) {
		$this->imagePath = $imagePath;

		return $this;
	}

	/**
	 * Returns name.
	 *
	 * 
	 *
	 * @return map[string,string]
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets name.
	 *
	 * @param map[string,string] $name
	 * @return PaymentMethodBrand
	 */
	public function setName($name) {
		if (is_array($name) && empty($name)) {
			$this->name = new \stdClass;
		} else {
			$this->name = $name;
		}

		return $this;
	}

	/**
	 * Returns paymentMethod.
	 *
	 * 
	 *
	 * @return int
	 */
	public function getPaymentMethod() {
		return $this->paymentMethod;
	}

	/**
	 * Sets paymentMethod.
	 *
	 * @param int $paymentMethod
	 * @return PaymentMethodBrand
	 */
	protected function setPaymentMethod($paymentMethod) {
		$this->paymentMethod = $paymentMethod;

		return $this;
	}

	/**
	 * Validates the model's properties and throws a ValidationException if the validation fails.
	 *
	 * @throws ValidationException
	 */
	public function validate() {

	}

	/**
	 * Returns true if all the properties in the model are valid.
	 *
	 * @return boolean
	 */
	public function isValid() {
		try {
			$this->validate();
			return true;
		} catch (ValidationException $e) {
			return false;
		}
	}

	/**
	 * Returns the string presentation of the object.
	 *
	 * @return string
	 */
	public function __toString() {
		if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
			return json_encode(\Wallee\Sdk\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
		}

		return json_encode(\Wallee\Sdk\ObjectSerializer::sanitizeForSerialization($this));
	}

}

