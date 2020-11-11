<?php


namespace App\Xml;


class CustomXml extends BaseXml
{
    /**
     * @param string $from
     * @return $this
     */
    public function from(string $from)
    {
        return $this->set(compact('from'));
    }

    public function to(string $to)
    {
        return $this->set(compact('to'));
    }

    public function body(string $body)
    {
        return $this->set(compact('body'));
    }
}
