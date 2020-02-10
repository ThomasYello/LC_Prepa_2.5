<style>
.slider 
{
width: 500px;
height: 300px;
overflow: hidden;
margin: 60px auto;
}
.slides 
{
width: calc(500px * 3);
animation: glisse 10s infinite;
}
.slide 
{
float: left;
}
@keyframes glisse 
{
0% {
transform: translateX(0);
}
10% {
transform: translateX(0);
}
33% {
transform: translateX(-500px);
}
43% {
transform: translateX(-500px);
}
66% {
transform: translateX(-1000px);
}
76% {
transform: translateX(-1000px);
}
100% {
	transform: translateX(0);
}
}
</style>


<?php
$page =  (!empty($_GET['page']) ? $_GET['page'] : 0 );
$page = ($page <= 0 ? 1 :$page);


?>
  <section id="pageContent">
  <article>
    <br><h1>Bienvenue sur le site LC Prépa</h1>
  </article>
  
  <article>

  <div class="content">
   
     

<div class="slider">
		<div class="slides">
			<div class="slide"><img src="./img/1.jpg" alt="" /></div>
			<div class="slide"><img src="./img/2.jpg" alt="" /></div>
			<div class="slide"><img src="./img/1.jpg" alt="" /></div>
		</div>
	</div>

    
  </div>

</article>
<br>

<div align="center">
<h1>Partenaire officiel : Evo Corse faite vivre la sportivité</h1><br>

<video src="./video/pub.mp4" width="700" controls></video>
</div>
