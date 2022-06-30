<?php
/**
 * Template name: Скоро
 */
 ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Raleway:wght@600&display=swap" rel="stylesheet">
</head>
<style>
    .error-title {
        color: #000;
       font-family: "Raleway";
       font-style: normal;
       font-weight: 600;
       font-size: 90px;
       text-shadow: 5px 5px 0px #ffc530;
       transition: 0.1s;
       text-align: center;
    }
    
    .error-title:hover {
       text-shadow: -5px -5px 0px #346a2b;
    }
    
    .inst-link{
        margin-top: 50px;
        vertical-align: middle;
        display: inline-block;
        width: 300px;
        height: 62px;
        font-family: "Amatic SC";
        text-decoration: none;
        text-align: center;
        line-height: 60px;
        font-size: 34px;
        color: #fff;
        background-color: #346A2B;
        border-radius: 10px;
        cursor: pointer;
    }
    .inst-link::before{
        margin-right: 13px;
        content: '';
        display: inline-block;
        width: 40px;
        height: 40px;
        background: url(https://facebookbrand.com/wp-content/uploads/2019/10/Copy-of-instagram.svg);
        vertical-align: middle;
        background-size: cover;
    }
    .soon-title{
        padding: 0 50px;
    }
    @media(max-width:1235px){
        .soon-title{
            font-size: 70px;
        }
    }
    @media(max-height:600px){
        .soon-title{
            font-size: 70px;
        }
    }
    @media(max-width:990px){
        .soon-title{
            font-size: 56px;
        }
    }
    @media(max-width:815px){
        .soon-title{
            font-size: 42px;
        }
        .inst-link{
            font-size: 30px;
            height: 52px;
            line-height: 50px;
            width: 260px;
        }
        .inst-link::before{
            width: 36px;
            height: 36px;
        }
    }
    @media(max-width:640px){
        .soon-title{
            font-size: 30px;
        }
        .inst-link{
            font-size: 28px;
            height: 50px;
            line-height: 48px;
            width: 270px;
        }
        .inst-link::before{
            width: 32px;
            height: 32px;
        }
    }
</style>
    <div style="height:100vh; text-align:center; position: absolute; top: 15%;">
        <h1 class="error-title soon-title" style="margin: 0">Совсем скоро тут будет магазин с вкусными и полезными продуктами :)</h1>
        <a href="https://www.instagram.com/vegazona.ru/" class="vz-button inst-link">Перейти в instagram</a>
    </div>