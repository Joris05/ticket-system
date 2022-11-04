<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticket System - <?= $title; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/fonts.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="icon" href="<?= base_url() ?>assets/images/ticket-icon.png">
    <meta name="theme-color" content="#7952b3">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .go-corner {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            width: 32px;
            height: 32px;
            overflow: hidden;
            top: 0;
            right: 0;
            background-color: rgb(224, 102, 36);
            border-radius: 0 4px 0 32px;
        }

        span {
            color: white;
        }

        .datcard {
            height: 10em;
            color: white;
            display: block;
            font-family: sans-serif;
            position: relative;
            background-color: rgb(3, 36, 77);
            border-radius: 4px;
            padding: 1em;
            z-index: 0;
            overflow: hidden;
            text-decoration: none !important;
        }

        .datcard:before {
            content: "";
            position: absolute;
            z-index: -1;
            top: -16px;
            right: -16px;
            background: rgb(224, 102, 36);
            height: 1em;
            width: 1em;
            border-radius: 100%;
            transform: scale(1);
            transform-origin: 50% 50%;
            transition: transform 0.25s ease-out;
        }

        .datcard:hover:before {
            transform: scale(45);
        }

        .datcard:hover p {
            transition: all 0.3s ease-out;
            color: rgb(255, 255, 255);
            color: rgba(255, 255, 255, 0.8);
        }

        .cardImg {
            background-color: #03244d;
            color: #03244d;
        }

        .cardIcon {
            color: #03244d;
        }

        .background-color {
            color: rgba(3, 36, 77, 0.1);
        }

        .invisible {
            display: none;
        }

        .visible {
            display: block;
        }

        .grid {
            background-color: #ffffff;
            border-radius: 10px 10px / 0px 0px;
            margin-bottom: 20px;
        }

        #pageHeader {
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .gridHeader {
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
            text-align: center;
            margin-bottom: 10px;
        }

        .gridHeaderTxt {
            color: #000000;
            padding: 10px 0px;
        }

        .gridRow {
            padding-bottom: 25px;
        }

        .cardImg {
            background-color: #f4f4ff;
            color: #65377b;
            padding: 25px;
        }

        .link {
            color: #727375;
            padding: 17px 0px;
            width: 100%;
            text-align: center;
            cursor: pointer;
            font-size: 14px;
        }

        .link100 {
            color: #727375;
            padding: 17px 0px;
            width: 100% !important;
            text-align: center;
            cursor: pointer;
            font-size: 14px;
        }

        .link:hover {
            background-color: #f1f1f1;
            color: #03244d;
            transition: background 0.5s ease;
        }

        .link100:hover {
            background-color: #f4f4ff;
            color: #000000;
            transition: background 0.5s ease;
        }

        .card-action-bar {
            display: flex;
            border-top: 1px solid #e0e0e0;
            width: 100%;
        }

        .center {
            text-align: center;
        }

        .wrimagecard {
            margin-top: 0;
            margin-bottom: 1.5rem;
            text-align: center;
            position: relative;
            background: #fff;
            box-shadow: 0 15px 20px 0px rgba(46, 61, 73, 0.15);
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .wrimagecard .far {
            position: relative;
            font-size: 70px;
        }

        .wrimagecard .fas {
            position: relative;
            font-size: 70px;
        }

        .wrimagecard-topimage_header {
            background-color: rgba(3, 36, 77, 0.1);
            padding: 20px;
        }

        a.wrimagecard:hover,
        .wrimagecard-topimage:hover {
            box-shadow: 2px 4px 8px 0px rgba(46, 61, 73, 0.2);
        }

        .wrimagecard-topimage a {
            height: 100%;
            display: block;
        }

        .wrimagecard-topimage_title {
            padding: 20px 24px;
            height: 80px;
            padding-bottom: 0.75rem;
            position: relative;
        }

        .wrimagecard-topimage a {
            border-bottom: none;
            text-decoration: none;
            color: #525c65;
            transition: color 0.3s ease;
        }

        .h-140 {
            height: 140px !important;
        }

        #navBtns {
            width: 100%;
        }

        /*modal */
        .modalHeader {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            border-top-left-radius: 0.3rem;
            border-top-right-radius: 0.3rem;
            width: 100%;
            text-align: center;
        }

        .closeModalLink100 {
            color: #727375;
            padding: 17px 0px;
            width: 100%;
            text-align: center;
            cursor: pointer;
            font-size: 14px;
        }

        .closeModalLink100:hover {
            background-color: #fff0d9;
            color: #03244d;
            transition: background 0.5s ease;
        }

        .modal-body {
            padding-left: 1.3rem;
            padding-right: 1.3rem;
        }

        .modalFooter {
            display: flex;
            border-top: 1px solid #e0e0e0;
            width: 100%;
        }

        .bg-g {
            padding: 7px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }

        .app {
            display: grid;
            grid-gap: 15px;
            grid-template-columns: repeat(auto-fit, minmax(10em, 1fr));
            justify-items: center;
        }

        .display-4 {
            font-size: 1.5rem;
        }

        .card.tile {
            height: 10em;
            width: 10.75em;
            text-align: center;
        }

        .card.tile:hover {
            box-shadow: 0 0 1rem 0 #00000040;
            transform: scale(1.05);
        }


        .bg-secondary-orange {
            background-color: #f68026;
        }

        .top {
            display: flex;
            justify-content: space-between;
        }

        .topper {
            padding: 0;
            height: .5rem;
        }

        a {
            text-decoration: none !important;
        }

        a.btn.btn-info.btn-sm {
            justify-content: center;
        }

        .top {
            align-items: baseline;
        }

        span.fa-3x.mb-auto.mt-auto {
            color: black;
        }

        tr:hover {
            cursor: pointer;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>assets/css/navbar-top-fixed.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">Ticket System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
                <ul class="navbar-nav ms-auto flex-nowrap">
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>create" class="nav-link m-2 menu-item">
                            <i class="fas fa-plus"></i> Create Ticket
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>tickets/all" class="nav-link m-2 menu-item">
                            <i class="fas fa-ticket-alt"></i> Tickets
                        </a>
                    </li>
                    <?php
                    if ($this->session->userdata('utype') === 'admin') {
                    ?>
                        <li class="nav-item">
                            <a href="<?= base_url(); ?>admin/dashboard" class="nav-link m-2 menu-item">
                                <i class="fas fa-cog"></i> Admin
                            </a>
                        </li>
                    <?php } ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link m-2 menu-item dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back <?= $this->session->userdata('username'); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="<?= base_url(); ?>logout">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>