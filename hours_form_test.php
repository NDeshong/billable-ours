<?php
//login_form_test.php
include_once 'includes/settings.php';
require_once 'simpletest/autorun.php';
require_once 'simpletest/web_tester.php';

class LoginForm extends WebTestCase {

	  function testCorrectPassword() {
		$this->get(VIRTUAL_PATH . '/login.php');
		$this->assertResponse(200);

        $this->setField("hours", "1.5");
		$this->setField("rate", "50");
		$this->clickSubmit("Show Pay");

		$this->assertResponse(200);
		$this->assertText("You input 1.5 hours at a rate of $50 and your pay is $75");
	}
	
 	 function testFailedPassword() {
		$this->get(VIRTUAL_PATH . '/login.php');
		$this->assertResponse(200);

		$this->setField("name", "John");
		$this->setField("password", "XYZXYZ");//incorrect password
		$this->clickSubmit("Login");

		$this->assertResponse(200);
		$this->assertText("Login and/or password is incorrect");
	}

}
