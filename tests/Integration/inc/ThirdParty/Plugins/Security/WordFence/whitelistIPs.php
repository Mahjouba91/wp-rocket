<?php

namespace WP_Rocket\ThirdParty\Plugins\Security\WordFence;

use WP_Rocket\Tests\Integration\TestCase;
use WP_Rocket\ThirdParty\Plugins\Security\WordFenceCompatibility;
use wordfence;

/**
 * @covers \WP_Rocket\ThirdParty\Plugins\Security\WordFenceCompatibility::whitelist_wordfence_firewall_ips
 *
 * @group  WordFence
 * @group  ThirdParty
 */
class Test_WordFenceWhitelistIPs extends TestCase {

	public function setUp() : void {

		parent::setup();
		wordfence::$white_listed_ips =[];
		$this->WordFenceCompatibility        = new WordFenceCompatibility();
	}

	/**
	 * @dataProvider providerTestData
	 */
	public function testShouldAddWitelistIPs( $expected ) {


		//$ips=['135.125.83.227'];


		$this->WordFenceCompatibility->whitelist_wordfence_firewall_ips();

		$this->assertEquals( $expected, wordfence::getWhiteListedIPs() );

	}
	public function providerTestData() {
		return $this->getTestData( __DIR__, 'whitelistIPs' );
	}
}
