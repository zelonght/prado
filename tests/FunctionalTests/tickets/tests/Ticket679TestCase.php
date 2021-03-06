<?php
class Ticket679TestCase extends PradoGenericSelenium2Test
{
	function test()
	{
		$base = 'ctl0_Content_';
		$this->url('tickets/index.php?page=Ticket679');
		$this->assertEquals($this->title(), "Verifying Ticket 679");

		// First part of ticket : Repeater bug
		$this->byId($base."ctl0")->click();
		$this->pause(800);
		$this->assertText($base."myLabel",'outside');
		$this->assertVisible($base."myLabel");

		// Reload completly the page
		$this->refresh();
		$this->pause(800);

		$this->byId($base."Repeater_ctl0_ctl0")->click();
		$this->pause(800);
		$this->assertText($base."myLabel",'inside');
		$this->assertVisible($base."myLabel");

		// Second part of ticket : ARB bug
		$this->assertFalse($this->byId("{$base}myRadioButton")->selected());
		$this->byId($base."ctl1")->click();
		$this->pause(800);
		$this->assertTrue($this->byId("{$base}myRadioButton")->selected());
		$this->byId($base."ctl2")->click();
		$this->pause(800);
		$this->assertFalse($this->byId("{$base}myRadioButton")->selected());
		$this->pause(800);
	}

}