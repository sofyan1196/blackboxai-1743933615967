<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'session', 'form_validation');
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'form', 'file', 'security');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('User_model', 'Package_model', 'Order_model', 'Esim_model');
