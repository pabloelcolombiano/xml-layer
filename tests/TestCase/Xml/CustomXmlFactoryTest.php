<?php


namespace App\Test\TestCase\Xml;


use App\Xml\CustomXml;
use Cake\TestSuite\TestCase;

class CustomXmlFactoryTest extends TestCase
{
    public function testCustom()
    {
        $from = 'Juliet';
        $to = 'Paris';
        $body = "Don't waste your love on somebody, who doesn't value it.";
        $xml = CustomXml::init()
            ->from($from)
            ->to($to)
            ->body($body)
            ->toString();

        $this->assertTextContains("<custom>", $xml);
        $this->assertTextContains("<to>$to</to>", $xml);
        $this->assertTextContains("<from>$from</from>", $xml);
        $this->assertTextContains("<body>$body</body>", $xml);
        $this->assertTextContains("</custom>", $xml);
    }
}
