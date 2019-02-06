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
    <?= $this->Html->css('fonts-awesome/css/fontawesome-all.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script('jquery.min.js') ?>

    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('custom.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body style="">
<div class="image-fond"></div>
<div class="contenu">
<nav class="navbar navbar-inverse navbar-fixed-top" style="margin-bottom: 0; box-shadow: 0 7px 7px #CCC ">
    <div class="container" style="color: #4b6584">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="font-size: 20px; font-weight: bolder"><i class=""  style="color: red ;font-size: 34px"><?= $this->Html->image('logo-obac.png',['fullBase'=>true,'class'=>'logo-obac']) ?></i> &nbsp;&nbsp;  OBAC RISK MANAGEMENT</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= $this->Url->build(['controller'=>'Users', 'action'=>'login']) ?>"><i class="glyphicon glyphicon-user"></i>&nbsp; MON ESPACE</a></li>
                <li><a href="#"></a></li>

            </ul>
        </div><!--/.nav-collapse -->



    </div>
</nav>
<div class="container">
    <?= $this->Flash->render() ?>
</div>

<div class="container" id="front-wrapper" >
    <?= $this->fetch('content') ?>
</div>

    <div class="page-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="panel panel-default" >
                        <div class="panel-heading text-center">
                            <h1 class="panel-title" style="font-weight: 900">ORM</h1>
                        </div>
                        <div class="panel-body">
                            OBAC RISK MANAGEMENT est un service offert par le cabinet OBAC afin de permettre :
                            <ul>
                                <li>Aux organismes financiers de réduire le montant des créances en souffrance</li>
                                <li>Aux fournisseurs de maitriser le risque de leur client</li>
                                <li>Aux business angels de mesurer le risque des projets dans lesquels ils investissent</li>
                                <li>Aux porteurs de projet, d’atteindre les objectifs de performance, de coûts et de
                                    délais en maitrisant ou en réduisant les risques inhérents à leur projet.</li>
                            </ul>

                            Basé sur l’expérience d’une quarantaine d’experts reconnus dans leur secteur d’activité et
                            recrutés sur la base d’un processus de sélection particulièrement rigoureux, OBAC RISK MANAGEMENT
                            est un logiciel expert qui permet à ses utilisateurs de disposer en interne d’une expertise rare et couteuse à un prix accessible.

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="panel panel-default ">
                        <div class="panel-heading text-center">
                            <h2 class="panel-title" style="font-weight: 800">OBAC</h2>
                        </div>
                        <div style="text-align: justify" class="panel-body">
                            Le cabinet OBAC est un cabinet de conseils stratégiques et financiers, spécialisé sur la restructuration d’entreprise
                            qui s’est fixé pour objectif d’aider les Organismes financiers à réduire le montant des créances en souffrance, d’aider
                            les entreprises ayant des problèmes de trésorerie à se restructurer, à lever des fonds et d’aider les chefs d’entreprise
                            à développer une mentalité intrapreneuriale au sein de leur entreprise par le biais de la formation. Par ailleurs,
                            le cabinet OBAC organise tous les trimestres le colloque trimestriel des investisseurs
                            (un événement qui réunit le monde de la finance autour d’un secteur d’activité afin d’y apporter des solutions concrètes)
                            et tous les mois, l’Afterwork « Business Talk » afin de donner la parole aux chefs d’entreprise ainsi qu’aux experts
                            et permettre aux porteurs de projet d’accroitre leur réseau et lever des fonds.  Le cabinet OBAC est très investi dans l’écosystème
                            entrepreneurial afin de véhiculer l’esprit d’entreprendre. Notre vision est d’être présent dans les 6 pays de la CEMAC d’ici 2025.
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h4 class="panel-title" style="font-weight: 800">CONTACTS</h4>
                        </div>
                        <div class="panel-body">
                            <h6 class="page-header" style="padding: 10px; background-color: white; margin: 10px">A POINTE-NOIRE</h6>
                            <ul>
                                <li>Immeuble Société Générale, Rond point Kassai, 2ème étage, dans les bureaux de notre holding SBV CONSULTING.</li>
                                <li>
                                    Email : Contactpnr@cabinet-obac.com
                                </li>
                                <li>
                                    Tel : +242 06 970 48 98
                                </li>
                            </ul>
                            <h6 class="page-header" style="padding: 10px; background-color: white; margin: 10px">A BRAZZAVILLE</h6>
                            <ul>
                                <li>1978 Avenue des trois Martyrs, Plateaux Batignole</li>
                                <li>Email : Contactbzv@cabinet-obac.com</li>
                                <li> Tel : +242 06 889 40 40</li>
                            </ul>


                            Site internet : www.cabinet-obac.com

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer navbar-fixed-bottom" style="box-shadow: 0 1px 7px #CCC ">
        <div class="container">
            <div class="row">
                <p class="text-center"><span class="text-info"><a href="" style="font-size: 16px; color: #ffffff; font-weight: 900 ">OBAC RISK MANAGEMENT</a> </span> <span class="fa-bold"><a
                            href="http://alliages-technologies.com" style="font-size: 12px; color: red">&nbsp;&nbsp; PAR ALLIAGES TECHNOLOGIES</a></span></p>
            </div>
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



