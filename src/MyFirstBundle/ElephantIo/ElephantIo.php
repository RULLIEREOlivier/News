<?php

namespace MyFirstBundle\Controller;
use ElephantIO\Client, ElephantIO\Engine\SocketIO\Version1X;

use MyFirstBundle\Entity\News;
use MyFirstBundle\Form\NewsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


$client = new Client(new Version1X('http://localhost:8080'));

$client ->initialize();

$client ->emit('emitPHP', ['message' => 'Message émis depuis PHP !']);

$client ->close();
