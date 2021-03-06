<?php

class TextBoxCallbackTestCase extends PradoGenericSelenium2Test
{
	function test()
	{
		$base='ctl0_Content_';
		$this->url("active-controls/index.php?page=ActiveTextBoxCallback");
		$this->assertSourceContains("ActiveTextBox Callback Test");
		$this->assertText("{$base}label1", "Label 1");

		$this->type("{$base}textbox1", "hello!");
		$this->pause(800);
		$this->assertText("{$base}label1", "Label 1: hello!");
	}
}
