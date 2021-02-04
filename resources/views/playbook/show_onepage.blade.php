<style>
    #canvas_container {
        width: 800px;
        height: 450px;
        overflow: auto;
    }

    #canvas_container {
        background: #333;
        text-align: center;
        border: solid 3px;
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
                
                <div id="my_pdf_viewer">
                    <div id="canvas_container">
                        <canvas id="pdf_renderer"></canvas>
                    </div>

                    <div id="navigation_controls">
                        <button id="go_previous">Previous</button>
                        <input id="current_page" value="1" type="number" />
                        <button id="go_next">Next</button>
                    </div>

                    <div id="zoom_controls">
                        <button id="zoom_in">+</button>
                        <button id="zoom_out">-</button>
                    </div>
                </div>

            </div>


        </div>
        <!-- ./Ajax Page Main Content -->
    </div>
    <!-- container-fluid -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js">
</script>

<script>
    var myState = {
        pdf: null,
        currentPage: 1,
        zoom: 1
    }

    pdfjsLib.getDocument('http://local.ugro/uploads/lesson/laravel_tutorial.pdf').then((pdf) => {
        myState.pdf = pdf;
        render();

    });

    function render() {
        myState.pdf.getPage(myState.currentPage).then((page) => {

            var canvas = document.getElementById("pdf_renderer");
            var ctx = canvas.getContext('2d');

            var viewport = page.getViewport(myState.zoom);

            canvas.width = viewport.width;
            canvas.height = viewport.height;

            page.render({
                canvasContext: ctx,
                viewport: viewport
            });
        });
    }

    document.getElementById('go_previous').addEventListener('click', (e) => {
        if (myState.pdf == null || myState.currentPage == 1)
            return;
        myState.currentPage -= 1;
        document.getElementById("current_page").value = myState.currentPage;
        render();
    });

    document.getElementById('go_next').addEventListener('click', (e) => {
        if (myState.pdf == null || myState.currentPage > myState.pdf._pdfInfo.numPages)
            return;
        myState.currentPage += 1;
        document.getElementById("current_page").value = myState.currentPage;
        render();
    });

    document.getElementById('current_page').addEventListener('keypress', (e) => {
        if (myState.pdf == null) return;

        // Get key code
        var code = (e.keyCode ? e.keyCode : e.which);

        // If key code matches that of the Enter key
        if (code == 13) {
            var desiredPage =
                document.getElementById('current_page').valueAsNumber;

            if (desiredPage >= 1 && desiredPage <= myState.pdf._pdfInfo.numPages) {
                myState.currentPage = desiredPage;
                document.getElementById("current_page").value = desiredPage;
                render();
            }
        }
    });

    document.getElementById('zoom_in').addEventListener('click', (e) => {
        if (myState.pdf == null) return;
        myState.zoom += 0.5;
        render();
    });

    document.getElementById('zoom_out').addEventListener('click', (e) => {
        if (myState.pdf == null) return;
        myState.zoom -= 0.5;
        render();
    });

</script>
