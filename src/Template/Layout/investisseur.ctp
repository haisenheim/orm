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
        ORMSYS
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>



    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('datatables.min.css') ?>
    <?= $this->Html->css('fonts-awesome/css/fontawesome-all.css') ?>
    <?= $this->Html->css('front-style.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('loader.css') ?>


    <?= $this->Html->script('jquery.min.js') ?>

    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('custom.js') ?>
    <?= $this->Html->script('datatables.js') ?>
    <?= $this->Html->script('Chart.min.js') ?>


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
            <a class="navbar-brand" href="#" style="color: darkgray; font-size: 20px; font-weight: bolder">  ORMSYS</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?= $this->Url->build(['controller'=>'Front', 'action'=>'index' ]) ?>"><i class="fa fa-home"></i></a>
                </li>

                <li>
                    <a href="<?= $this->Url->build(['controller'=>'Dossiers', 'action'=>'add' ]) ?>"><i class="fa fa-folder-open"></i>&nbsp; NOUVEAU DOSSIER</a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller'=>'Dossiers', 'action'=>'index' ]) ?>"><i class="fa fa-folder"></i>&nbsp; GESTION DES DOSSIERS</a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller'=>'Plignes', 'action'=>'index' ]) ?>"><i class="fa fa-list-alt"></i>&nbsp; SUIVI DES RISQUES</a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller'=>'Plignes', 'action'=>'index' ]) ?>"><i class="fa fa-list-alt"></i>&nbsp; SUIVI DES RISQUES</a>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <span style="color: white; box-shadow: none;  " class=" btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i style="font-size: 24px"><?= $this->Html->image($usr['imageUri']?$usr['imageUri']:'avatar.png',['fullBase'=>true,'style'=>'max-width:50px; max-height:30px','class'=>'img img-circle']) ?></i>

                    </span>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li>
                            <a href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'edit' ]) ?>"><i class="fa fa-user"></i>&nbsp; MON PROFIL</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-question-circle"></i>&nbsp; CONTACTER OBAC</a>
                        </li>

                        <li>
                            <a href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'logout','prefix'=>false ]) ?>"><i class="fa fa-power-off"></i>&nbsp; SE DECONNECTER</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

    <?= $this->Flash->render() ?>


<h5 style="background-color: #ddddff; margin-top: 5px; padding-top: 15px" class="page-header"><span style="margin-left:30px ">ESPACE DE TRAVAIL - <span class="" style="text-shadow: 1px 1px 2px black"><?= $company->name ?></span></span> <span class="page-title pull-right" style="margin-right: 30px"><?= !empty($title)?$title:'' ?></span> </h5>
<div class="container" id="front-wrapper" style="margin-bottom: 50px">
    <?= $this->fetch('content') ?>
</div>

<div class="page-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="panel">
                    <div class="panel-heading text-center">
                        <i class="fa fa-bus"></i>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid dolorum eos eum,
                            incidunt nesciunt possimus sint ullam veritatis vitae voluptates? Blanditiis
                            commodi eligendi fugit labore, laboriosam nam nostrum reprehenderit tenetur!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="panel">
                    <div class="panel-heading text-center">
                        <i class="fa fa-user-friends"></i>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid dolorum eos eum,
                            incidunt nesciunt possimus sint ullam veritatis vitae voluptates? Blanditiis
                            commodi eligendi fugit labore, laboriosam nam nostrum reprehenderit tenetur!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="panel">
                    <div class="panel-heading text-center">
                        <i class="fa fa-times-circle"></i>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid dolorum eos eum,
                            incidunt nesciunt possimus sint ullam veritatis vitae voluptates? Blanditiis
                            commodi eligendi fugit labore, laboriosam nam nostrum reprehenderit tenetur!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="footer navbar-fixed-bottom" style="background-color: #2f3640; margin-top: 20px; box-shadow: 0 1px 7px #CCC ">
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



