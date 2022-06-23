<head>
    <!-- Required meta tags -->


    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

</head>

<body>

    <footer class="footer-32892 pb-0">
        <div class="site-section">
            <div class="container-fluid">


                <div class="row">
                    <!-- Aspirasi Masyarakat-->
                    <div class="col-6">
                        <div class="card-content">
                            <div class="posisi2">
                                <div class="card-body">
                                    <h3>Ajukan Pertanyaan</h3>
                                    <form class="form form-vertical">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="form-group">
                                                        <input type="text" id="first-name-vertical"
                                                            class="form-control" name="name"
                                                            placeholder="First Name">
                                                    </div>
                                                </div>
                                                <div class="col-10">
                                                    <div class="form-group">
                                                        <input type="text" id="email-id-vertical"
                                                            class="form-control" name="prihal" placeholder="Perihal">
                                                    </div>
                                                </div>
                                                <div class="col-10">
                                                    <div class="form-group">
                                                        <input type="number" id="contact-info-vertical"
                                                            class="form-control" name="contact" placeholder="Mobile">
                                                    </div>
                                                </div>
                                                <div class="col-10">
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Pertanyaan atau Aspirasi"></textarea>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-10
                                                            d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Goole Maps-->
                    <div class="col-6">
                        <div class="card-content">
                            <div class="posisi">
                                <div class="card-body">
                                    <h3>Ajukan Pertanyaan</h3>
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.6091242787!2d107.57311654129782!3d-6.903273917028756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1633023222539!5m2!1sen!2sid"
                                        width="500" height="500" style="border:0;" allowfullscreen=""
                                        loading="lazy">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/footer.min.js') }}"></script>
</body>
