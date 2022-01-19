@extends('layouts.layout')
@section('content')
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Features -->
            <section id="features">
                <div class="container">
                    <header>
                        <h2> <strong>Our Library Services</strong> </h2>
                    </header>
                    <div class="row aln-center">
                        <div class="col-4 col-6-medium col-12-small">
                            <!-- Feature -->
                                <section>
                                    <a href="/books" class="image featured"><img src="{{ asset('images/pic01.jpg') }}" alt="" /></a>
                                    <header>
                                        <h3>View our large collection of books</h3>
                                    </header>
                                    <p>with over <strong>2 Million books</strong>, our library has everything you are looking for!
                                </section>
                        </div>
                        <div class="col-4 col-6-medium col-12-small">
                            <!-- Feature -->
                                <section>
                                    <a href="/home" class="image featured"><img src="{{ asset('images/pic02.jpg') }}" alt="" /></a>
                                    <header>
                                        <h3>Register now to order books!</h3>
                                    </header>
                                    <p><strong>Register now</strong>, to place an order for a book, which you can simply 
                                        collect from the library or get delivered to your home</p>
                                </section>
                        </div>
                        <div class="col-4 col-6-medium col-12-small">
                            <!-- Feature -->
                                <section>
                                    <a href="#" class="image featured"><img src="{{ asset('images/pic03.jpg') }}" alt="" /></a>
                                    <header>
                                        <h3>Meet our team!</h3>
                                    </header>
                                    <p><strong>Knowlegable and friendly</strong> our staff are here to help you 
                                        browse our collection, to help you find what you are looking for! </p>
                                </section>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><a href="#" class="button icon solid fa-file">Tell Me More</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

			<!-- Banner -->
				<section id="banner">
					<div class="container">
						<p>incredible facility! One of the 
							<strong>Best Libraries in the world!</strong>.<br />
						-the Guradian</p>
					</div>
				</section>

			<!-- Main -->
				<section id="main">
					<div class="container">
						<div class="row">

							<!-- Content -->
								<div id="content" class="col-8 col-12-medium">

									<!-- Post -->
										<article class="box post">
											<header>
												<h2><a href="#">new study says <strong>Coffee is melting our brains!!</strong></h2>
											</header>
											<a href="#" class="image featured"><img src="{{ asset('images/pic04.jpg') }}" alt="" /></a>
											<h3>I mean isn't it possible?</h3>
											<p>Phasellus laoreet massa id justo mattis pharetra. Fusce suscipit
											ligula vel quam viverra sit amet mollis tortor congue. Sed quis mauris
											sit amet magna accumsan tristique. Curabitur leo nibh, rutrum eu malesuada
											in, tristique at erat lorem ipsum dolor sit amet lorem ipsum sed consequat
											magna tempus veroeros lorem sed tempus aliquam lorem ipsum veroeros
											consequat magna tempus lorem ipsum consequat Phasellus laoreet massa id
											justo mattis pharetra. Fusce suscipit ligula vel quam viverra sit amet
											mollis tortor congue. Sed quis mauris sit amet magna accumsan tristique.
											Curabitur leo nibh, rutrum eu malesuada in tristique.</p>
											<ul class="actions">
												<li><a href="#" class="button icon solid fa-file">Continue Reading</a></li>
											</ul>
										</article>

								</div>

							<!-- Sidebar -->
								<div id="sidebar" class="col-4 col-12-medium">

									<!-- Excerpts -->
										<section>
											<ul class="divided">
												<li>

													<!-- Excerpt -->
														<article class="box excerpt">
															<header>
																<span class="date">July 30</span>
																<h3><a href="#">Just another post</a></h3>
															</header>
															<p>Lorem ipsum dolor odio facilisis convallis. Etiam non nunc vel est
															suscipit convallis non id orci lorem ipsum sed magna consequat feugiat lorem dolore.</p>
														</article>

												</li>
												<li>

													<!-- Excerpt -->
														<article class="box excerpt">
															<header>
																<span class="date">July 28</span>
																<h3><a href="#">And another post</a></h3>
															</header>
															<p>Lorem ipsum dolor odio facilisis convallis. Etiam non nunc vel est
															suscipit convallis non id orci lorem ipsum sed magna consequat feugiat lorem dolore.</p>
														</article>

												</li>
												<li>

													<!-- Excerpt -->
														<article class="box excerpt">
															<header>
																<span class="date">July 24</span>
																<h3><a href="#">One more post</a></h3>
															</header>
															<p>Lorem ipsum dolor odio facilisis convallis. Etiam non nunc vel est
															suscipit convallis non id orci lorem ipsum sed magna consequat feugiat lorem dolore.</p>
														</article>

												</li>
											</ul>
										</section>


								</div>

						</div>
					</div>
				</section>
                @endsection