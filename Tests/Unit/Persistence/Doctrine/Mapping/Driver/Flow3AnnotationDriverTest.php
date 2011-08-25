<?php
namespace TYPO3\FLOW3\Tests\Unit\Persistence\Doctrine\Mapping\Driver;

/*                                                                        *
 * This script belongs to the FLOW3 framework.                            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Testcase for the FLOW3 annotation driver
 *
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Flow3AnnotationDriverTest extends \TYPO3\FLOW3\Tests\UnitTestCase {

	/**
	 * Data provider for testInferTableNameFromClass
	 *
	 * @return array
	 * @author Christopher Hlubek <hlubek@networkteam.com>
	 */
	public function classNameToTableNameMappings() {
		return array(
			array('TYPO3\Party\Domain\Model\Person', 'typo3_party_domain_model_person'),
			array('SomePackage\Domain\Model\Blob', 'somepackage_domain_model_blob'),
			array('TYPO3\FLOW3\Security\Policy\Role', 'typo3_flow3_security_policy_role'),
			array('TYPO3\FLOW3\Security\Account', 'typo3_flow3_security_account'),
			array('TYPO3\FLOW3\Security\Authorization\Resource\SecurityPublishingConfiguration', 'typo3_flow3_security_authorization_resource_securitypublis_6180a')
		);
	}

	/**
	 * @test
	 * @dataProvider classNameToTableNameMappings
	 * @author Christopher Hlubek <hlubek@networkteam.com>
	 */
	public function testInferTableNameFromClass($className, $tableName) {
		$driver = new \TYPO3\FLOW3\Persistence\Doctrine\Mapping\Driver\Flow3AnnotationDriver();
		$this->assertEquals($tableName, $driver->inferTableNameFromClassName($className));
	}

}
?>