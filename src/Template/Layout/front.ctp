<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        YAYATO
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>



    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('navbar-fixed-top.css') ?>
    <?= $this->Html->css('carousel.css') ?>
    <?= $this->Html->css('dashboard-sticky-footer-navbar.css') ?>
    <?= $this->Html->css('front-style.css') ?>

    <?= $this->Html->script('jquery.min.js') ?>

    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('custom.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body style="background-color: #FFFFFF">
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #2f3640; margin-bottom: 0; box-shadow: 0 7px 7px #CCC ">
    <div class="container" style="color: #4b6584">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color: darkgray; font-size: 20px; font-weight: bolder"><i class="glyphicon glyphicon-road"  style="color: red ;font-size: 34px"></i> &nbsp;&nbsp;  ORMSYS</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'login']) ?>"><i class="glyphicon glyphicon-user"></i>&nbsp; MON ESPACE</a></li>
                <li><a href="#"></a></li>

            </ul>
        </div><!--/.nav-collapse -->



    </div>
</nav>
<?= $this->Flash->render() ?>
<h5 class="text-center page-header">OBAC RISK MANAGER</h5>
<div class="container" id="front-wrapper" >
    <?= $this->fetch('content') ?>
</div>
<div class="footer navbar-fixed-bottom" style="background-color: #2f3640; margin-bottom: 0; box-shadow: 0 1px 7px #CCC ">

    <div class="container">

        <div class="row">
            <p class="text-center"><span class="text-info"><a href="" style="font-size: 14px; color: #ffffff">OBAC RISK MANAGEMENT SYSTEM</a> </span> <span class="fa-bold"><a
                        href="http://alliages-technologies.com" style="font-size: 12px; color: red">&nbsp;&nbsp; PAR ALLIAGES TECHNOLOGIES</a></span></p>

        </div>
    </div>

</div>
</body>
</html>

<style>
    .navbar-inverse .navbar-nav > li > a{
        color: #FFFFFF;
        font-size: 12px;
    }

    .navbar-inverse .navbar-nav > li >a > i{

        font-size: 20px;
    }
</style>



