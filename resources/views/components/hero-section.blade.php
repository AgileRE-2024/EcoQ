<div class="container my-4 align-items-center">
    <div class="row w-100">
        <!-- Teks Judul dan Deskripsi -->
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h1 class="display-4 fw-bold text-success" style="font-family: 'Libre Baskerville', serif;">A Beautiful Adventure Awaits</h1>
            <p class="text-muted" style="font-family: 'Roboto', sans-serif;">
                Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Tincidunt Facilisis Nunc
            </p>
            <div class="mt-3">
                <a href="{{ url('/katalog') }}" class="btn btn-outline-green me-2">KATALOG</a>
                <a href="#" class="btn btn-outline-success">LEARN MORE</a>
            </div>
        </div>

        <!-- Gambar -->
        <div class="col-md-6 d-flex justify-content-center"">
            <img src="{{ asset('assets/images/garden.jpg') }}" alt="Beautiful Adventure" class="img-fluid" style="width: 80%; height: 90%; border-top-left-radius: 250px; border-top-right-radius: 250px;">
        </div>
    </div>
</div>
