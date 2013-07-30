<?php
    try
    {
        $this->lessphp->checkedCompile(BASEPATH.'../css/style.less',BASEPATH.'../css/style.css');
        $this->lessphp->checkedCompile(BASEPATH.'../library/bootstrap/less/responsive.less',BASEPATH.'../css/responsive.css');
    }
    catch (exception $e)
    {
        echo "fatal error: " . $e->getMessage();
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Simple Book Keeper - <?php echo $title ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/style.css" type="text/css" />
        <link rel="stylesheet" href="/css/responsive.css" type="text/css" />
        <style type="text/css" media="screen">
            body{padding-top:60px;}
        </style>
    </head>    <body id="header" onload="">
        <div class="wrapper">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="brand" href="/" title="Simple Book Keeper Dashboard">Simple Book Keeper</a>
                        <div class="nav-collapse collapse">
                            <ul class="nav">
                                <li class="<?php if($current === 'journalNew'){ echo 'active';}  ?>">
                                    <a href="/journal/new" title="Add Journal Entry"><i class="icon-plus"></i></a>
                                </li>
                                <li class="<?php if($current === 'journalIndex'){ echo 'active';}  ?>">
                                    <a href="/journal/" title="View Journal Entries">Journal Entries</a>
                                </li>
                                <li class="<?php if($current === 'accountIndex'){ echo 'active';}  ?>">
                                    <a href="/account/" title="View/Edit Accounts">Accounts</a>
                                </li>
                                <li class="<?php if($current === 'contactIndex'){ echo 'active';}  ?>">
                                    <a href="/contact/" title="View/Edit Contacts">Contacts</a>
                                </li>
                                <li class="<?php if($current === 'reportIndex'){ echo 'active';}  ?>">
                                    <a href="/report/" title="View Reports">Reports</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                
            