@extends('front.master')

@section('content')
    <div class="contact-page">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-uppercase"> <a href="index.html" class="text-primary">Home</a></li>
                <li class="breadcrumb-item active text-uppercase">Contact</li>
            </ol>
        </div>
        <!-- Contact page-->
        <section class="contact p-t-small">
            <div class="container">
                <header class="mb-5">
                    <h1 class="heading-line">Contact</h1>
                    <p class="lead text-muted">
                        Are you curious about something? Do you have some kind of problem with our products? As am hastily invited settled at limited civilly fortune me. Really spring in extent an by. Judge but built party world. Of so am
                        he remember although required. Bachelor unpacked be advanced at. Confined in declared marianne is vicinity.
                    </p>
                </header>
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-icon">
                            <div class="icon icon-051-placeholder-1"></div>
                        </div>
                        <h3>Address</h3>
                        <p class="text-muted font-weight-light">13/25 New Avenue<br>New Heaven, 45Y 73J<br>England, <strong>Great Britain</strong></p>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-icon">
                            <div class="icon icon-051-support"></div>
                        </div>
                        <h3>Call center</h3>
                        <p class="text-muted font-weight-light">This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communication.</p>
                        <p><strong>+33 555 444 333</strong></p>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-icon">
                            <div class="icon icon-051-message"></div>
                        </div>
                        <h3>Electronic support</h3>
                        <p class="text-muted font-weight-light">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                        <ul class="list-style-none">
                            <li><strong><a href="mailto:">info@fakeemail.com</a></strong></li>
                            <li><strong><a href="#">
                                        Ticketio
                                        - our ticketing support platform</a></strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <div id="map">                                       </div>
        <section>
            <div class="container">
                <header class="mb-5">
                    <h2 class="heading-line">Contact form</h2>
                </header>
                <div class="row">
                    <div class="col-md-7">
                        <form id="contact-form" method="post" action="contact.php" class="custom-form form">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Your firstname *</label>
                                            <input type="text" name="name" id="name" placeholder="Enter your firstname" required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="surname">Your lastname *</label>
                                            <input type="text" name="surname" id="surname" placeholder="Enter your  lastname" required="required" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Your email *</label>
                                    <input type="email" name="email" id="email" placeholder="Enter your  email" required="required" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="message">Your message for us *</label>
                                    <textarea rows="4" name="message" id="message" placeholder="Enter your message" required="required" class="form-control"></textarea>
                                </div>
                                <input type="submit" value="Send message" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5">
                        <p class="text-muted font-weight-light">Effects present letters inquiry no an removed or friends. Desire behind latter me though in. Supposing shameless am he engrossed up additions. My possible peculiar together to. Desire so better am cannot he up before points. Remember mistaken opinions it pleasure of debating. Court front maids forty if aware their at. Chicken use are pressed removed. </p>
                        <p class="text-muted font-weight-light">Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh. </p>
                        <div class="social">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-behance"></i></a></li>
                                <li class="list-inline-item"><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Search Panel-->
    <div class="search-overlay">
        <div class="search-inner d-flex justify-content-center align-items-center">
            <div class="search-close"><i class="icon-close"></i></div>
            <div class="container">
                <div class="form-holder">
                    <form class="d-flex">
                        <input type="search" placeholder="What are you looking for...">
                        <button type="submit" class="search text-primary text-uppercase">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection