<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pagina Pricipal</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script src="../js/jquery.js"></script>
<script src="../js/craftyslide.min.js"></script>
</head>

<body>
<header>
	<div class="cabecalho">
        <div class="logo">F<span>S</span></div>
        <p>Fábrica de Sonhos</p>
        <div id="login">
            <a href="#">Entrar</a>
            <a href="#">Cadastre-se</a>
        </div>
    </div>
    <section id="slide">
        <div id="slideshow">
            <ul>
           		<li><img src="images/slider.jpg" alt="slide" /></li>
                <li><img src="images/slider1.jpg" alt="slide1" /></li>
                <li><img src="images/slider2.jpg" alt="slide2" /></li>
                <li><img src="images/slider3.jpg" alt="slide3" /></li>                
            </ul>
        </div>    
        <article>Ajude as pessoas por um <b>mundo melhor</b>, Doe agora<br/>
        <a href="">Faça sua Doação</a>
        <p>Click aqui para doar agora !</p></article> 
    </section>             
</header>
<div class="listra-left"></div>
<div class="listra-right"></div>
<nav>
    <ul>
        <li><a href="home.php" title="homepage">HOME</a>
        <li><a href="kids.php" title="whoweare">QUEM SOMOS</a>
        <li><a href="login.php" title="makedonations">DOAÇÕES</a>
        <li><a href="family.php" title="ourwork">PROJETOS</a>
        <li><a href="#" title="hotnews">NOTICIAS</a>
        <li><a href="#" title="contacts">CONTATOS</a>
    </ul>
</nav>   
<script>
$("#slideshow").craftyslide();
</script>

