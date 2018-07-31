<!DOCTYPE html>
<html class="no-focus">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <title>Digi-System</title>

        <!-- fav icon -->
        <link rel="shortcut icon" href="{{ asset('new-assets') }}/img/favicons/favicon.png">

        <!-- Web fonts -->
        <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700"> -->

        <!-- Pages CSS -->
        <link rel="stylesheet" href="{{ asset('new-assets') }}/js/plugins/slick/slick.min.css">
        <link rel="stylesheet" href="{{ asset('new-assets') }}/js/plugins/slick/slick-theme.min.css">
        <link rel="stylesheet" href="{{ asset('new-assets') }}/js/plugins/datatables/jquery.dataTables.min.css">

        <!-- OneUI CSS framework -->
        <link rel="stylesheet" id="css-main" href="{{ asset('new-assets') }}/css/oneui.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('new-assets') }}/js/popup.css">
        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <link rel="stylesheet" href="{{asset('js/plugins/datatables/jquery.dataTables.min.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <!-- OneUI CSS framework -->
        <link rel="stylesheet" id="css-main" href="{{asset('css/oneui.css')}}">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->

        <!-- Admin LTE Files -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/Ionicons/css/ionicons.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/iCheck/all.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/select2/dist/css/select2.min.css">
        <!-- <link rel="stylesheet" href="{{ asset('adminlte') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/skins/_all-skins.min.css">
        <!-- Admin LTE Files -->
        <style type="text/css" media="screen">
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                padding: 3px !important
            }
        </style>
        @yield('styles')
    </head>
    <body style="background-color: #e6e6e6">

        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
