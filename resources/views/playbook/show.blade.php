<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/page-playbook-show.css') }}?v={{ time() }}">
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
            <p class="ugro-path">
                <a class="ugro-path-first" href="#playbook-overview">The Playbook</span><span
                    class="ugro-path-second"> /
                    {{ $playbook->title }} </a>
            </p>
            <div style="text-align: right" class="mb-2">
                <button onclick="tooglethumbnail()">show/hide thumbnail</button>
                <button onclick="onecolumn()">1 page</button>
                <button onclick="twocolumn()">2 page</button>
            </div>

            <!-- PDF BOX -->
            <div id="pdf-box" class="row">
                <div id="pdf-thumbnail" class="s-nicescoll col-sm-2">
                </div>
                <div id="pdf-content-container" class="s-nicescoll col-sm-10">
                    <div id="pdf-content">
                    </div>
                </div>
            </div>
            <!-- ./PDF BOX -->


            <div id="zoombuttongroup" class="btn-group-vertical" role="group" aria-label="Vertical button group">
                <button type="button" class="btn btn-black" onclick="zoomin()"><i
                        class="fas fa-plus"></i></button></button>
                <button type="button" class="btn btn-black" onclick="zoomdefault()"><i
                        class="fas fa-search"></i></button></button>
                <button type="button" class="btn btn-black" onclick="zoomout()"><i
                        class="fas fa-minus"></i></button></button>
            </div>
        </div>
        <!-- ./Ajax Page Main Content -->
    </div>
    <!-- container-fluid -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>

<script>
    url = '/uploads/playbook/{{ $playbook->pdffile }}';
    var thePdf = null;
    var zoom = 1;
    var column = 1;
    var singlemode = true;
    var currentpage = 1;
    var pdfjshandle;

    $(document).ready(function() {
        pdfjshandle = setInterval(function() {
            pdfjsLib.getDocument(url).promise.then(function(pdf) {
                thePdf = pdf;
                showThumbnail();
                showpage(currentpage);
                clearInterval(pdfjshandle);
            });
        }, 1000);

    });

    function showThumbnail() {
        var viewer = $("#pdf-thumbnail");
        var render_width = viewer.width();
        for (pagenum = 1; pagenum <= thePdf.numPages; pagenum++) {
            canvas = document.createElement("canvas");
            canvas.className = 'pdf-page-canvas';
            canvas.setAttribute('onclick', `showpage(${pagenum})`);
            viewer.append(canvas);
            viewer.append(`<p class="mt-1"><span class="pagenumber" id="${pagenum}">${pagenum}</span></p>`);
            renderPage(pagenum, canvas, render_width / 1.5);
        }
    }

    function showpage(pagenum) {
        if (currentpage != pagenum) {
            currentpage = pagenum;
            // zoom = 1;
            // setDefaultPosition();
        }

        var viewer = $("#pdf-content");

        var render_width = viewer.width() / 2.2;
        viewer.html('');

        canvas1 = document.createElement("canvas");
        canvas1.className = 'pdf-page-canvas';
        viewer.append(canvas1);
        renderPage(pagenum, canvas1, render_width);

        if (column == 2) {
            console.log('render 2nd')
            canvas2 = document.createElement("canvas");
            canvas2.className = 'pdf-page-canvas';
            viewer.append(canvas2);
            renderPage(pagenum + 1, canvas2, render_width);
        }
        console.log("pagenum: ", pagenum, "columm: ", column, "zoom: ", zoom,
            "viewer_width: ", viewer.width(), "render_width: ", render_width);

        $(".pagenumber").removeClass('active');
        $(".pagenumber#" + pagenum).addClass('active');
    }


    function renderPage(pageNumber, canvas, render_width) {
        thePdf.getPage(pageNumber).then(function(page) {
            var originwidth = page.getViewport(1).width;
            var scale = render_width / originwidth;
            viewport = page.getViewport(scale);
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            console.log('scale: ', scale, ' canvas_width: ', canvas.width)
            page.render({
                canvasContext: canvas.getContext('2d'),
                viewport: viewport
            });
        });
    }

    function twocolumn() {
        zoom = 1;
        column = 2;
        setDefaultPosition();
        showpage(currentpage);
        $("#pdf-content .pdf-page-canvas").css('display', 'inline');
    }

    function onecolumn() {
        zoom = 1;
        column = 1;
        setDefaultPosition();
        showpage(currentpage);
        $("#pdf-content .pdf-page-canvas").css('display', 'block');

    }

    function zoomin() {
        if (zoom * 1.3 > 3) return;
        zoom *= 1.3;
        $("#pdf-content").css('width', `${100*zoom}%`);
        showpage(currentpage);
    }

    function zoomout() {
        if (zoom / 1.3 < 1 / 3) return;
        zoom /= 1.3;
        $("#pdf-content").css('width', `${100*zoom}%`);
        showpage(currentpage);
    }

    function zoomdefault() {
        zoom = 1;
        setDefaultPosition();
        showpage(currentpage);
    }

    function setDefaultPosition() {
        $("#pdf-content").css('width', `${100*zoom}%`);
        $("#pdf-content").css('left', '50%');
        $("#pdf-content").css('top', '50%');
        $("#pdf-content").css('transform', 'translate(-50%, -50%)');
    }

    function tooglethumbnail() {
        $("#pdf-thumbnail").toggle();
        if ($("#pdf-thumbnail").is(":visible")) {
            $("#pdf-content-container").addClass('col-sm-10');
        } else {
            $("#pdf-content-container").removeClass('col-sm-10');
        }
    }


    //Make the DIV element draggagle:
    dragElement(document.getElementById("pdf-content"));

    function dragElement(elmnt) {
        var pos1 = 0,
            pos2 = 0,
            pos3 = 0,
            pos4 = 0;
        if (document.getElementById('pdf-content-container')) {
            /* if present, the header is where you move the DIV from:*/
            document.getElementById('pdf-content-container').onmousedown = dragMouseDown;
        } else {
            /* otherwise, move the DIV from anywhere inside the DIV:*/
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            /* stop moving when mouse button is released:*/
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }

</script>
