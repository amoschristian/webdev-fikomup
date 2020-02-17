<?php
$folder_template = web_info('url') . '/' . folder_template();

//prepare the data to be display news
$query = "SELECT * FROM artikel ";
if (isset($_GET['tag'])) {
	$tag = $_GET['tag'];
	$query .= "WHERE tag LIKE '%$tag%' ";
}
$query .= "ORDER BY tanggal DESC LIMIT 3"; //show 10 per page

$result = $mysqli->query($query);
$detail_berita = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$sentences = 1;
	$text_pendek =  implode('. ', array_slice(explode('.', strip_tags($data['isi'])), 0, $sentences)) . '.';

	$detail_berita[$data['id_artikel']] = $data;
	$detail_berita[$data['id_artikel']]['desc'] = $text_pendek;
}

//prepare the data to be display event
$query = "SELECT * FROM event ";
if (isset($_GET['tag'])) {
	$tag = $_GET['tag'];
	$query .= "WHERE tag LIKE '%$tag%' ";
}
$query .= "ORDER BY tanggal DESC LIMIT 3"; //show 10 per page

$result = $mysqli->query($query);
$detail_event = [];

while ($data = $result->fetch_array(MYSQLI_ASSOC)) {
	$sentences = 2;
	$text_pendek =  implode('. ', array_slice(explode('.', strip_tags($data['isi'])), 0, $sentences)) . '.';

	$detail_event[$data['id_event']] = $data;
	$detail_event[$data['id_event']]['desc'] = $text_pendek;
}
?>

<!DOCTYPE html>
<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Odibee+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script|Odibee+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Libre+Franklin&display=swap" rel="stylesheet">


<?php
include('template/meta_head.php');
?>

<body>

	<div class="super_container">

		<!-- Header -->

		<?php include('template/header.php'); ?>

		<!-- Home -->

		<div class="home">

			<!-- Hero Slider -->
			<div class="hero_slider_container">
				<!-- Hero Slide -->
				<div class="hero_slide">
				<div id="particles-js"></div>				
					<div class="welcome">Welcome to <strong style="color: #FF4F00;">FIKom.UP</strong></div>
					<div class="learn">Get More Informations</div>
					
					<!-- <button class="vd-yt" id="show-video"><i class="fa fa-play-circle" area-hidden="true"> &nbsp</i>video </button>
					<div class="mfp-hide mfp-hide-hidden" style="max-width: 75%; margin: 0 auto;">
					<div class="closer-bar"><span>X</span> </div>
					<iframe width="760" height="515" src="https://www.youtube.com/embed/39Ru65BLgP4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div> -->
				</div>
			</div>

			<div class="hero_boxes">
			<div class="hero_boxes_inner">
				<div class="container">
					<div class="row">
						<!-- <div class="col-lg-3 hero_box_col" style="text-align: -webkit-center;">
							<div class="hero_box flex-row align-items-center justify-content-start" style="background: #841b24;">
								<img src="<?= $folder_template . '/images/binoculars.svg' ?>" class="svg" alt="">
								<div class="hero_box_content">
									<h2 class="hero_box_title">Vision</h2>
									
								</div>
							</div>
						</div>

						<div class="col-lg-3 hero_box_col" style="text-align: -webkit-center;">
							<div class="hero_box flex-row align-items-center justify-content-start" style="background: #8f9622;">
								<img src="<?= $folder_template . '/images/earth-globe.svg' ?>" class="svg" alt="">
								<div class="hero_box_content">
									<h2 class="hero_box_title">Site Map</h2>
								
								</div>
							</div>
						</div>

						<div class="col-lg-3 hero_box_col" style="text-align: -webkit-center;">
							<div class="hero_box flex-row align-items-center justify-content-start" style="background: #8c7022">
								<img src="<?= $folder_template . '/images/books.svg' ?>" class="svg" alt="">
								<div class="hero_box_content">
									<h2 class="hero_box_title">Download</h2>
									
								</div>
							</div>
						</div>

						<div class="col-lg-3 hero_box_col" style="text-align: -webkit-center;">
							<div class="hero_box flex-row align-items-center justify-content-start" style="background: #531263">
								<img src="<?= $folder_template . '/images/professor.svg' ?>" class="svg" alt="">
								<div class="hero_box_content">
									<h2 class="hero_box_title">Course</h2>
									
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
		</div>

		<!-- Popular -->
		<div class="popular page_section">
			<div class="container">

			<!-- berita -->
				<div class="row course_boxes">
				<?php if ($detail_berita) : ?>
					<?php foreach ($detail_berita as $berita) : ?>
						<!-- news -->
						<div class="col-lg-4 course_box">
							<div class="card">
								<img class="card-img-top" src="<?= "/media/source/" . $berita['gambar'] ?>" alt="#">
								<div class="card-body text-center">
									<div class="card-title"><a href="#"><?= $berita['judul']; ?></a></div>
									<div class="card-text"><?= $berita['desc'] ?></div>
								</div>
								<div class="price_box d-flex flex-row align-items-center">
									<div class="course_author_image">
										<img src="<?= $folder_template . '/images/author.jpg' ?>" alt="#">
									</div>
									<div class="course_author_name">Michael Smith, <span>Author</span></div>
									<div class="course_price d-flex flex-column align-items-center justify-content-center"><span><a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>">Read More</a></span></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
					<?php else : ?>
						<h3>News not found</h3>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<!-- Register -->

		<div class="register page_section">
			<div class="container-fluid">
				<div class="row row-eq-height">
					<!-- Register -->

					<div class="register_section d-flex flex-column align-items-center justify-content-center">
						<div class="register_content text-center">
							<h1 class="register_title">Faculty of Communication Universitas Pancasila</h1>

							<div class="button button_1 register_button mx-auto trans_200"><a href="#">Learn More</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- News -->

		<div class="news page_section">
				<div class="container">

				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Publications</h1>
						</div>
					</div>
				</div>

				<div class="event_items">
						<?php if ($detail_berita) : ?>
							<?php foreach ($detail_berita as $berita) : ?>
								<!-- news -->
								<div class="col-lg-4 course_box">
									<div class="card">
										<img class="card-img-top" src="<?= "/media/source/" . $berita['gambar'] ?>" alt="#">
										<div class="card-body text-center">
											<div class="card-title"><a href="#"><?= $berita['judul']; ?></a></div>
											<div class="card-text"><?= $berita['desc'] ?></div>
										</div>
										<div class="price_box d-flex flex-row align-items-center">
											<div class="course_author_image">
												<img src="<?= $folder_template . '/images/author.jpg' ?>" alt="#">
											</div>
											<div class="course_author_name">Michael Smith, <span>Author</span></div>
											<div class="course_price d-flex flex-column align-items-center justify-content-center"><span><a href="<?= "/news/id/{$berita['id_artikel']}/{$berita['judul_seo']}"; ?>">Read More</a></span></div>
										</div>
									</div>
								</div>
							<?php endforeach; ?>

						<?php else : ?>
							<h3>News not found</h3>
						<?php endif; ?>
					</div>
				</div>
			</div>

		<!-- Testimonials -->

		<div class="testimonials page_section">
			<!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
			<div class="testimonials_background_container prlx_parent">
				<div class="testimonials_background prlx" style="background-image:url(<?= $folder_template . '/images/fik.JPG' ?>)"></div>
			</div>
			<div class="container">

				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>FIKom.UP on Twitter</h1>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-10 offset-lg-1">

						<div class="testimonials_slider_container">

							<!-- Testimonials Slider -->
							<div class="owl-carousel owl-theme testimonials_slider">

								<!-- Testimonials Item -->
								<div class="owl-item">
									<div class="testimonials_item text-center">
										<div class="quote">“</div>
										<p class="testimonials_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
										<div class="testimonial_user">
											<div class="testimonial_image mx-auto">
												<img src="<?= $folder_template . '/images/bl.JPG' ?>" alt="">
											</div>
											<div class="testimonial_name">Admin</div>
											<div class="testimonial_title">2019-8-12</div>
										</div>
									</div>
								</div>

								<!-- Testimonials Item -->
								<div class="owl-item">
									<div class="testimonials_item text-center">
										<div class="quote">“</div>
										<p class="testimonials_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
										<div class="testimonial_user">
											<div class="testimonial_image mx-auto">
												<img src="<?= $folder_template . '/images/bl.JPG' ?>" alt="">
											</div>
											<div class="testimonial_name">Admin</div>
											<div class="testimonial_title">2019-4-24</div>
										</div>
									</div>
								</div>

								<!-- Testimonials Item -->
								<div class="owl-item">
									<div class="testimonials_item text-center">
										<div class="quote">“</div>
										<p class="testimonials_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
										<div class="testimonial_user">
											<div class="testimonial_image mx-auto">
												<img src="<?= $folder_template . '/images/bl.JPG' ?>" alt="">
											</div>
											<div class="testimonial_name">Admin</div>
											<div class="testimonial_title">2019-8-5</div>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- Events -->

		<div class="events page_section">
			<div class="container">

				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>Upcoming Events</h1>
						</div>
					</div>
				</div>

				<div class="event_items">

					<!-- Event Item -->
					<?php if ($detail_event) : ?>
						<?php foreach ($detail_event as $event) : ?>
							<div class="row event_item">
								<div class="col">
									<div class="row d-flex flex-row align-items-end">

										<div class="col-lg-2 order-lg-1 order-2">
											<div class="event_date d-flex flex-column align-items-center justify-content-center">
												<div class="event_day"><?= date('d', strtotime($event['tanggal'])) ?></div>
												<div class="event_month"><?= print_tanggal($event['tanggal'], "%b") ?></div>
												<div class="event_year"><?= date('Y', strtotime($event['tanggal'])) ?></div>
											</div>
										</div>

										<div class="col-lg-6 order-lg-2 order-3">
											<div class="event_content">
												<div class="event_name"><a class="trans_200" href="<?= "/event/id/{$event['id_event']}/{$event['judul_seo']}"; ?>"><?= $event['judul'] ?></a></div>
												<div class="event_location"><?= $event['lokasi'] ?></div>
												<p><?= $event['isi'] ?></p>
											</div>
										</div>

										<div class="col-lg-4 order-lg-3 order-1">
											<div class="event_image">
												<img src="<?= print_image($event['gambar']); ?>">
											</div>
										</div>

									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else : ?>
						<h3><?= $title_head ?> not found</h3>
					<?php endif; ?>

				</div>

			</div>
		</div>

		<!-- Partner -->

		<?php include('template/partner.php'); ?>

		<!-- Footer -->

		<?php include('template/footer.php'); ?>

	</div>

	<?php include('template/meta_footer.php'); ?>


<script>

function launchParticlesJS(a,e){var i=document.querySelector("#"+a+" > canvas");pJS={canvas:{el:i,w:i.offsetWidth,h:i.offsetHeight},particles:{color:"#fff",shape:"circle",opacity:1,size:2.5,size_random:true,nb:200,line_linked:{enable_auto:true,distance:100,color:"#fff",opacity:1,width:1,condensed_mode:{enable:true,rotateX:65000,rotateY:65000}},anim:{enable:true,speed:1},array:[]},interactivity:{enable:true,mouse:{distance:100},detect_on:"canvas",mode:"grab",line_linked:{opacity:1},events:{onclick:{enable:true,mode:"push",nb:4}}},retina_detect:false,fn:{vendors:{interactivity:{}}}};if(e){if(e.particles){var b=e.particles;if(b.color){pJS.particles.color=b.color}if(b.shape){pJS.particles.shape=b.shape}if(b.opacity){pJS.particles.opacity=b.opacity}if(b.size){pJS.particles.size=b.size}if(b.size_random==false){pJS.particles.size_random=b.size_random}if(b.nb){pJS.particles.nb=b.nb}if(b.line_linked){var j=b.line_linked;if(j.enable_auto==false){pJS.particles.line_linked.enable_auto=j.enable_auto}if(j.distance){pJS.particles.line_linked.distance=j.distance}if(j.color){pJS.particles.line_linked.color=j.color}if(j.opacity){pJS.particles.line_linked.opacity=j.opacity}if(j.width){pJS.particles.line_linked.width=j.width}if(j.condensed_mode){var g=j.condensed_mode;if(g.enable==false){pJS.particles.line_linked.condensed_mode.enable=g.enable}if(g.rotateX){pJS.particles.line_linked.condensed_mode.rotateX=g.rotateX}if(g.rotateY){pJS.particles.line_linked.condensed_mode.rotateY=g.rotateY}}}if(b.anim){var k=b.anim;if(k.enable==false){pJS.particles.anim.enable=k.enable}if(k.speed){pJS.particles.anim.speed=k.speed}}}if(e.interactivity){var c=e.interactivity;if(c.enable==false){pJS.interactivity.enable=c.enable}if(c.mouse){if(c.mouse.distance){pJS.interactivity.mouse.distance=c.mouse.distance}}if(c.detect_on){pJS.interactivity.detect_on=c.detect_on}if(c.mode){pJS.interactivity.mode=c.mode}if(c.line_linked){if(c.line_linked.opacity){pJS.interactivity.line_linked.opacity=c.line_linked.opacity}}if(c.events){var d=c.events;if(d.onclick){var h=d.onclick;if(h.enable==false){pJS.interactivity.events.onclick.enable=false}if(h.mode!="push"){pJS.interactivity.events.onclick.mode=h.mode}if(h.nb){pJS.interactivity.events.onclick.nb=h.nb}}}}pJS.retina_detect=e.retina_detect}pJS.particles.color_rgb=hexToRgb(pJS.particles.color);pJS.particles.line_linked.color_rgb_line=hexToRgb(pJS.particles.line_linked.color);if(pJS.retina_detect&&window.devicePixelRatio>1){pJS.retina=true;pJS.canvas.pxratio=window.devicePixelRatio;pJS.canvas.w=pJS.canvas.el.offsetWidth*pJS.canvas.pxratio;pJS.canvas.h=pJS.canvas.el.offsetHeight*pJS.canvas.pxratio;pJS.particles.anim.speed=pJS.particles.anim.speed*pJS.canvas.pxratio;pJS.particles.line_linked.distance=pJS.particles.line_linked.distance*pJS.canvas.pxratio;pJS.particles.line_linked.width=pJS.particles.line_linked.width*pJS.canvas.pxratio;pJS.interactivity.mouse.distance=pJS.interactivity.mouse.distance*pJS.canvas.pxratio}pJS.fn.canvasInit=function(){pJS.canvas.ctx=pJS.canvas.el.getContext("2d")};pJS.fn.canvasSize=function(){pJS.canvas.el.width=pJS.canvas.w;pJS.canvas.el.height=pJS.canvas.h;window.onresize=function(){if(pJS){pJS.canvas.w=pJS.canvas.el.offsetWidth;pJS.canvas.h=pJS.canvas.el.offsetHeight;if(pJS.retina){pJS.canvas.w*=pJS.canvas.pxratio;pJS.canvas.h*=pJS.canvas.pxratio}pJS.canvas.el.width=pJS.canvas.w;pJS.canvas.el.height=pJS.canvas.h;pJS.fn.canvasPaint();if(!pJS.particles.anim.enable){pJS.fn.particlesRemove();pJS.fn.canvasRemove();f()}}}};pJS.fn.canvasPaint=function(){pJS.canvas.ctx.fillRect(0,0,pJS.canvas.w,pJS.canvas.h)};pJS.fn.canvasRemove=function(){pJS.canvas.ctx.clearRect(0,0,pJS.canvas.w,pJS.canvas.h)};pJS.fn.particle=function(n,o,m){this.x=m?m.x:Math.random()*pJS.canvas.w;this.y=m?m.y:Math.random()*pJS.canvas.h;this.radius=(pJS.particles.size_random?Math.random():1)*pJS.particles.size;if(pJS.retina){this.radius*=pJS.canvas.pxratio}this.color=n;this.opacity=o;this.vx=-0.5+Math.random();this.vy=-0.5+Math.random();this.draw=function(){pJS.canvas.ctx.fillStyle="rgba("+this.color.r+","+this.color.g+","+this.color.b+","+this.opacity+")";pJS.canvas.ctx.beginPath();switch(pJS.particles.shape){case"circle":pJS.canvas.ctx.arc(this.x,this.y,this.radius,0,Math.PI*2,false);break;case"edge":pJS.canvas.ctx.rect(this.x,this.y,this.radius*2,this.radius*2);break;case"triangle":pJS.canvas.ctx.moveTo(this.x,this.y-this.radius);pJS.canvas.ctx.lineTo(this.x+this.radius,this.y+this.radius);pJS.canvas.ctx.lineTo(this.x-this.radius,this.y+this.radius);pJS.canvas.ctx.closePath();break}pJS.canvas.ctx.fill()}};pJS.fn.particlesCreate=function(){for(var m=0;m<pJS.particles.nb;m++){pJS.particles.array.push(new pJS.fn.particle(pJS.particles.color_rgb,pJS.particles.opacity))}};pJS.fn.particlesAnimate=function(){for(var n=0;n<pJS.particles.array.length;n++){var q=pJS.particles.array[n];q.x+=q.vx*(pJS.particles.anim.speed/2);q.y+=q.vy*(pJS.particles.anim.speed/2);if(q.x-q.radius>pJS.canvas.w){q.x=q.radius}else{if(q.x+q.radius<0){q.x=pJS.canvas.w+q.radius}}if(q.y-q.radius>pJS.canvas.h){q.y=q.radius}else{if(q.y+q.radius<0){q.y=pJS.canvas.h+q.radius}}for(var m=n+1;m<pJS.particles.array.length;m++){var o=pJS.particles.array[m];if(pJS.particles.line_linked.enable_auto){pJS.fn.vendors.distanceParticles(q,o)}if(pJS.interactivity.enable){switch(pJS.interactivity.mode){case"grab":pJS.fn.vendors.interactivity.grabParticles(q,o);break}}}}};pJS.fn.particlesDraw=function(){pJS.canvas.ctx.clearRect(0,0,pJS.canvas.w,pJS.canvas.h);pJS.fn.particlesAnimate();for(var m=0;m<pJS.particles.array.length;m++){var n=pJS.particles.array[m];n.draw("rgba("+n.color.r+","+n.color.g+","+n.color.b+","+n.opacity+")")}};pJS.fn.particlesRemove=function(){pJS.particles.array=[]};pJS.fn.vendors.distanceParticles=function(t,r){var o=t.x-r.x,n=t.y-r.y,s=Math.sqrt(o*o+n*n);if(s<=pJS.particles.line_linked.distance){var m=pJS.particles.line_linked.color_rgb_line;pJS.canvas.ctx.beginPath();pJS.canvas.ctx.strokeStyle="rgba("+m.r+","+m.g+","+m.b+","+(pJS.particles.line_linked.opacity-s/pJS.particles.line_linked.distance)+")";pJS.canvas.ctx.moveTo(t.x,t.y);pJS.canvas.ctx.lineTo(r.x,r.y);pJS.canvas.ctx.lineWidth=pJS.particles.line_linked.width;pJS.canvas.ctx.stroke();pJS.canvas.ctx.closePath();if(pJS.particles.line_linked.condensed_mode.enable){var o=t.x-r.x,n=t.y-r.y,q=o/(pJS.particles.line_linked.condensed_mode.rotateX*1000),p=n/(pJS.particles.line_linked.condensed_mode.rotateY*1000);r.vx+=q;r.vy+=p}}};pJS.fn.vendors.interactivity.listeners=function(){if(pJS.interactivity.detect_on=="window"){var m=window}else{var m=pJS.canvas.el}m.onmousemove=function(p){if(m==window){var o=p.clientX,n=p.clientY}else{var o=p.offsetX||p.clientX,n=p.offsetY||p.clientY}if(pJS){pJS.interactivity.mouse.pos_x=o;pJS.interactivity.mouse.pos_y=n;if(pJS.retina){pJS.interactivity.mouse.pos_x*=pJS.canvas.pxratio;pJS.interactivity.mouse.pos_y*=pJS.canvas.pxratio}pJS.interactivity.status="mousemove"}};m.onmouseleave=function(n){if(pJS){pJS.interactivity.mouse.pos_x=0;pJS.interactivity.mouse.pos_y=0;pJS.interactivity.status="mouseleave"}};if(pJS.interactivity.events.onclick.enable){switch(pJS.interactivity.events.onclick.mode){case"push":m.onclick=function(o){if(pJS){for(var n=0;n<pJS.interactivity.events.onclick.nb;n++){pJS.particles.array.push(new pJS.fn.particle(pJS.particles.color_rgb,pJS.particles.opacity,{x:pJS.interactivity.mouse.pos_x,y:pJS.interactivity.mouse.pos_y}))}}};break;case"remove":m.onclick=function(n){pJS.particles.array.splice(0,pJS.interactivity.events.onclick.nb)};break}}};pJS.fn.vendors.interactivity.grabParticles=function(r,q){var u=r.x-q.x,s=r.y-q.y,p=Math.sqrt(u*u+s*s);var t=r.x-pJS.interactivity.mouse.pos_x,n=r.y-pJS.interactivity.mouse.pos_y,o=Math.sqrt(t*t+n*n);if(p<=pJS.particles.line_linked.distance&&o<=pJS.interactivity.mouse.distance&&pJS.interactivity.status=="mousemove"){var m=pJS.particles.line_linked.color_rgb_line;pJS.canvas.ctx.beginPath();pJS.canvas.ctx.strokeStyle="rgba("+m.r+","+m.g+","+m.b+","+(pJS.interactivity.line_linked.opacity-o/pJS.interactivity.mouse.distance)+")";pJS.canvas.ctx.moveTo(r.x,r.y);pJS.canvas.ctx.lineTo(pJS.interactivity.mouse.pos_x,pJS.interactivity.mouse.pos_y);pJS.canvas.ctx.lineWidth=pJS.particles.line_linked.width;pJS.canvas.ctx.stroke();pJS.canvas.ctx.closePath()}};pJS.fn.vendors.destroy=function(){cancelAnimationFrame(pJS.fn.requestAnimFrame);i.remove();delete pJS};function f(){pJS.fn.canvasInit();pJS.fn.canvasSize();pJS.fn.canvasPaint();pJS.fn.particlesCreate();pJS.fn.particlesDraw()}function l(){pJS.fn.particlesDraw();pJS.fn.requestAnimFrame=requestAnimFrame(l)}f();if(pJS.particles.anim.enable){l()}if(pJS.interactivity.enable){pJS.fn.vendors.interactivity.listeners()}}window.requestAnimFrame=(function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(a){window.setTimeout(a,1000/60)}})();window.cancelRequestAnimFrame=(function(){return window.cancelAnimationFrame||window.webkitCancelRequestAnimationFrame||window.mozCancelRequestAnimationFrame||window.oCancelRequestAnimationFrame||window.msCancelRequestAnimationFrame||clearTimeout})();function hexToRgb(c){var b=/^#?([a-f\d])([a-f\d])([a-f\d])$/i;c=c.replace(b,function(e,h,f,d){return h+h+f+f+d+d});var a=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(c);return a?{r:parseInt(a[1],16),g:parseInt(a[2],16),b:parseInt(a[3],16)}:null}window.particlesJS=function(d,c){if(typeof(d)!="string"){c=d;d="particles-js"}if(!d){d="particles-js"}var b=document.createElement("canvas");b.style.width="100%";b.style.height="100%";var a=document.getElementById(d).appendChild(b);if(a!=null){launchParticlesJS(d,c)}};


particlesJS('particles-js', {
  particles: {
    color: '#FF4F00',
    shape: 'circle',
    opacity: 1,
    size: 4,
    size_random: true,
    nb: 150,
    line_linked: {
      enable_auto: true,
      distance: 250,
      color: '#FF4F00',
      opacity: 1,
      width: 1,
      condensed_mode: {
        enable: false,
        rotateX: 600,
        rotateY: 600
      }
    },
    anim: {
      enable: true,
      speed: 3
    }
  },
  interactivity: {
    enable: true,
    mouse: {
      distance: 400
    },
    detect_on: 'canvas', 
    mode: 'grab',
    line_linked: {
      opacity: .75
    },
    events: {
      onclick: {
        enable: true,
        mode: 'push', 
        nb: 4
      }
    } 
  },
  
  retina_detect: true
});
</script>
<script>

const toggleVideo = () => {
	document.querySelector('.mfp-hide')
	.classList.toggle('mfp-hide-hidden');
};

document.querySelector('#show-video')
	.addEventListener('click', toggleVideo);
	

</script>
</body>

</html>