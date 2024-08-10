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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Customer</a></li>

                                            <li class="breadcrumb-item active">Add Customer</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Customer</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">


                            <div class="col-lg-8 col-xl-8">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="tab-pane" id="settings">
                                            <form method="POST" action="{{route('customer.store')}}"  enctype="multipart/form-data">
                                                @csrf
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Customer Info</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Customer Name <code>*</code></label>
                                                            <input name="name" type="text" class="form-control
                                                            @error('name') is-invalid @enderror">

                                                            @error('name') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Customer Email <code>*</code></label>
                                                            <input name="email" type="email" class="form-control
                                                            @error('email') is-invalid @enderror">

                                                            @error('email') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Customer Phone <code>*</code></label>
                                                            <input name="phone" type="tel" class="form-control
                                                            @error('phone') is-invalid @enderror">

                                                            @error('phone') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Customer Address <code>*</code></label>
                                                            <input name="address" type="text" class="form-control
                                                            @error('address') is-invalid @enderror">

                                                            @error('address') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Customer Shop Name </label>
                                                            <input name="shop_name" type="text" class="form-control
                                                            @error('shop_name') is-invalid @enderror">

                                                            @error('shop_name') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Customer Account Holder </label>
                                                            <input name="account_holder" type="text" class="form-control
                                                            @error('account_holder') is-invalid @enderror">

                                                            @error('account_holder') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Customer Account Number </label>
                                                            <input name="account_number" type="number" class="form-control
                                                            @error('account_number') is-invalid @enderror">

                                                            @error('account_number') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Customer Bank Name </label>
                                                            <input name="bank_name" type="text" class="form-control
                                                            @error('bank_name') is-invalid @enderror">

                                                            @error('bank_name') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Customer Bank Branch </label>
                                                            <input name="bank_branch" type="text" class="form-control
                                                            @error('bank_branch') is-invalid @enderror">

                                                            @error('bank_branch') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Customer City </label>
                                                            <input name="city" type="text" class="form-control
                                                            @error('city') is-invalid @enderror">

                                                            @error('city') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="example-fileinput" class="form-label">Customer Image</label>
                                                            <input
                                                             name="image" type="file" id="image" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="example-fileinput" class="form-label">Image Display</label>
                                                            <img id="showImage" src="{{ url('upload/no_image.jpg')}}" class="rounded-circle avatar-lg img-thumbnail"
                                                            alt="profile-image">
                                                        </div>
                                                    </div>
                                                <!-- end col -->
                                                </div> <!-- end row -->

                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
