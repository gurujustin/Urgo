<style>
    #pdf-viewer {
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.1);
        overflow: auto;
    }

    .pdf-page-canvas {
        display: block;
        margin: 5px auto;
        border: 1px solid rgba(0, 0, 0, 0.2);
    }

</style>

<div class="page-content">
    <div class="container-fluid">
        <!-- Error -->
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endforeach
        <!-- ./Error -->

        <!-- Ajax Page Main Content -->
        <div id="mainContent">
            <div class="s-lesson-div">
                <p class="ugro-path">
                    <span class="ugro-path-first">The Playbook</span><span class="ugro-path-second"> / The Winning
                        Criteria </span>
                </p>
                <h1 class="lesson-title">{{ $playbook->title }}</h1>
                <div id='pdf-viewer'></div>

            </div>


        </div>
        <!-- ./Ajax Page Main Content -->
    </div>
    <!-- container-fluid -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js">
</script>

<script>
    url = 'http://local.ugro/uploads/lesson/laravel_tutorial.pdf';
    var thePdf = null;
    var scale = 1;

    pdfjsLib.getDocument(url).promise.then(function(pdf) {
        thePdf = pdf;
        viewer = document.getElementById('pdf-viewer');

        for (page = 1; page <= pdf.numPages; page++) {
            canvas = document.createElement("canvas");
            canvas.className = 'pdf-page-canvas';
            canvas.onclick = function() {gotoPage(page)};
            viewer.appendChild(canvas);
            renderPage(page, canvas);
        }
    });

    function renderPage(pageNumber, canvas) {
        thePdf.getPage(pageNumber).then(function(page) {
            viewport = page.getViewport(scale);
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            page.render({
                canvasContext: canvas.getContext('2d'),
                viewport: viewport
            });
        });
    }

    function gotoPage(num){
        // alert(num)
    }

</script>
