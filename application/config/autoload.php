<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('template', 'database', 'session', 'Recaptcha', 'fungsi', 'pagination');

$autoload['drivers'] = array();


$autoload['helper'] = array('url', 'fungsi_helper', 'file', 'form', 'security', 'html');

$autoload['config'] = array('recaptcha');


$autoload['language'] = array();


$autoload['model'] = array();
