@extends('admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Supplier</a></li>

                                            <li class="breadcrumb-item active">Supplier Details</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Supplier</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">


                            <div class="col-lg-8 col-xl-8">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="tab-pane" id="settings">
                                            <form method="GET" action="{{route('all.supplier')}}"  >
                                                @csrf

                                                <input type="hidden" name="id" value="{{$supplier->id}}">
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Supplier Info</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Name <code>*</code></label>
                                                            <p class="text-danger">{{$supplier->name}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Email <code>*</code></label>
                                                            <p class="text-danger">{{$supplier->email}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Phone <code>*</code></label>
                                                            <p class="text-danger">{{$supplier->phone}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Address <code>*</code></label>
                                                            <p class="text-danger">{{$supplier->address}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Shop Name </label>
                                                            <p class="text-danger">{{$supplier->shop_name}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Type </label>
                                                            <p class="text-danger">{{$supplier->type}}</p>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Account Holder </label>
                                                            <p class="text-danger">{{$supplier->account_holder}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Account Number </label>
                                                            <p class="text-danger">{{$supplier->account_number}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Bank Name </label>
                                                            <p class="text-danger">{{$supplier->bank_name}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Bank Branch </label>
                                                            <p class="text-danger">{{$supplier->bank_branch}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier City </label>
                                                            <p class="text-danger">{{$supplier->city}}</p>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="example-fileinput" class="form-label">Image Display</label>
                                                            <img id="showImage" src="{{ url($supplier->image)}}" class="rounded-circle avatar-lg img-thumbnail"
                                                            alt="profile-image">
                                                        </div>
                                                    </div>
                                                <!-- end col -->
                                                </div> <!-- end row -->

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> back </button>
                                                </div>
                                            </form>
                                        </div>
                                            <!-- end settings content-->


                                    </div>
                                </div> <!-- end card-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="">Coderthemes</a>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->



            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


@endsection
