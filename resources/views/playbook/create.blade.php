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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('playbook_store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h4 class="card-title">Input Data for Playbook</h4>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Category</label>
                                    <div class="col-md-10">
                                        <select name="category" id="" class="form-control">
                                            @foreach ($categories as $obj)
                                                <option value="{{ $obj->id }}"> {{ $obj->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Title</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Order</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="number" name="order" value="1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Case Image</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="caseimage" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">PDF File</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="pdffile" accept=".pdf">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Playbook</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
        <!-- ./Ajax Page Main Content -->
    </div>
    <!-- container-fluid -->
</div>

<script>
    $(document).ready(function() {});

</script>
