<?php


namespace App\Xml;


use Cake\Datasource\ModelAwareTrait;
use Cake\Log\LogTrait;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\Utility\Xml;
use Cake\View\ViewVarsTrait;
use Cake\View\XmlView;

class BaseXml
{
    use LocatorAwareTrait;
    use LogTrait;
    use ModelAwareTrait;
    use ViewVarsTrait;

    final public static function init(array $data = []): self
    {
        $xml =  new static();
        return $xml->set($data);
    }

    public function toString(): string
    {
        $view = $this->createView(XmlView::class);
        if ($this->getLayout()) {
            $view->setLayout($this->getLayout());
        }
        $view->setTemplate($this->getTemplate());

        return $view->render();
    }

    public function getTemplate(): string
    {
        $factoryName =  (new \ReflectionClass($this))->getShortName();

        return explode('Xml', $factoryName)[0];
    }

    public function getLayout(): ?string
    {
        return $this->viewBuilder()->getLayoutPath();
    }

    public function build()
    {
        return Xml::build($this->toString());
    }

    public function toArray()
    {
        Xml::toArray($this->build());
    }
}
