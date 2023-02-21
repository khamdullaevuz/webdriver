<?php
require 'vendor/autoload.php';

$serverUrl = 'http://localhost:4444';

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;

$chromeOptions = new ChromeOptions();
$chromeOptions->addArguments(['--headless']);
$capabilities = DesiredCapabilities::chrome();
$capabilities->setCapability(ChromeOptions::CAPABILITY_W3C, $chromeOptions);
$driver = RemoteWebDriver::create($serverUrl, $capabilities);

$driver->get('https://e-soft.uz');
$driver->findElement(WebDriverBy::name('q'))->sendKeys('php')->submit();
$driver->findElement(WebDriverBy::cssSelector('.img-link'))->click();

echo $driver->getTitle();
$driver->quit();