<?php
require 'vendor/autoload.php';

$serverUrl = 'http://localhost:4444';

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;

$driver = RemoteWebDriver::create($serverUrl, DesiredCapabilities::chrome());

$driver->get('https://e-soft.uz');
$driver->findElement(WebDriverBy::name('q'))->sendKeys('php')->submit();
$driver->findElement(WebDriverBy::cssSelector('.img-link'))->click();

echo $driver->getTitle();
$driver->quit();