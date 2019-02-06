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
       SGF - Alliages
    </title>
    <?= $this->Html->meta('icon') ?>



    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('navbar-fixed-top.css') ?>
    <?= $this->Html->css('../eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') ?>
    <?= $this->Html->css('carousel.css') ?>
    <?= $this->Html->css('dashboard-sticky-footer-navbar.css') ?>
    <?= $this->Html->css('front-style.css') ?>
    <?= $this->Html->css('loader.css') ?>

    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('Chart.min.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body style="background-color: #1abc9c">
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #27ae60; margin-bottom: 0; box-shadow: 2px 8px 16px #CCC ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> Gestion des Feedbacks</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <li>
                    <a href="<?= $this->Url->build(['controller'=>'Front', 'action'=>'index' ]) ?>"><i class="glyphicon glyphicon-home"></i> ACCUEIL</a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller'=>'Sessions', 'action'=>'index' ]) ?>"><i class="glyphicon glyphicon-edit"></i> SESSIONS</a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller'=>'Formations', 'action'=>'index' ]) ?>"><i class="glyphicon glyphicon-fullscreen"></i> FORMATIONS</a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller'=>'Formateurs', 'action'=>'index' ]) ?>"><i class="glyphicon glyphicon-education"></i> FORMATEURS</a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller'=>'Clients', 'action'=>'index' ]) ?>"><i class="glyphicon glyphicon-credit-card"></i> CLIENTS</a>
                </li>

                <li class="dropdown">
                    <span style="color: white; box-shadow: none; padding: 20px 0 " class=" btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i style="font-size: 24px" class="glyphicon glyphicon-cog"></i>PARAMETRES
                        <span class="caret"></span>
                    </span>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li>
                            <a href="<?= $this->Url->build(['controller'=>'Parametres', 'action'=>'index' ]) ?>"><i class="glyphicon glyphicon-cog"></i> Systeme</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller'=>'Champs', 'action'=>'index' ]) ?>"><i class="glyphicon glyphicon-tasks"></i>Criteres</a>
                        </li>
                        <li>
                            <a href="<?= $this->Url->build(['controller'=>'Categories', 'action'=>'index' ]) ?>"><i class="glyphicon glyphicon-list"></i>Categories </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'index' ]) ?>"><i class="glyphicon glyphicon-user"></i>Utilisateurs</a>
                        </li>
                    </ul>

                </li>



            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'logout']) ?>"><i class="glyphicon glyphicon-user"></i>&nbsp; <?= strtoupper($user?$user['username']:'Inconnu')  ?></a></li>
                <li><a href="#"></a></li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
    <?= $this->Flash->render() ?>
    <div class="container" id="front-wrapper" >
        <?= $this->fetch('content') ?>
    </div>
<div class="footer" style="background-color: #27ae60; margin-bottom: 0; box-shadow: 0 1px 7px #CCC">

    <div class="container">

        <div class="row">
            <p class="text-center"><span class="text-info"><a href="" style="font-size: 14px; color: #ffffff">Systeme de gestion des feedbacks</a> </span> <span class="fa-bold"><a
                        href="http://alliages-technologies.com" style="font-size: 12px">&nbsp;&nbsp; par Alliages</a></span></p>

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

