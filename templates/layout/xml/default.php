<?php
/**
 * @var \Cake\View\XmlView $this
 */

echo "<layout>";
dd('I am in the xml layout');
echo $this->fetch('content');

echo "</layout>";
