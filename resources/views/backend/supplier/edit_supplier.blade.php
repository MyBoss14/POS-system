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

                                            <li class="breadcrumb-item active">Add Supplier</li>
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
                                            <form method="POST" action="{{route('update.supplier')}}"  enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="id" value="{{$supplier->id}}">
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Supplier Info</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Name <code>*</code></label>
                                                            <input
                                                            value="{{$supplier->name}}"
                                                            name="name" type="text" class="form-control
                                                            @error('name') is-invalid @enderror">

                                                            @error('name') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Email <code>*</code></label>
                                                            <input
                                                            value="{{$supplier->email}}"
                                                            name="email" type="email" class="form-control
                                                            @error('email') is-invalid @enderror">

                                                            @error('email') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Phone <code>*</code></label>
                                                            <input
                                                            value="{{$supplier->phone}}"
                                                            name="phone" type="tel" class="form-control
                                                            @error('phone') is-invalid @enderror">

                                                            @error('phone') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Address <code>*</code></label>
                                                            <input
                                                            value="{{$supplier->address}}"
                                                            name="address" type="text" class="form-control
                                                            @error('address') is-invalid @enderror">

                                                            @error('address') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Shop Name </label>
                                                            <input
                                                            value="{{$supplier->shop_name}}"
                                                            name="shop_name" type="text" class="form-control
                                                            @error('shop_name') is-invalid @enderror">

                                                            @error('shop_name') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Type </label>
                                                            <input
                                                            value="{{$supplier->type}}"
                                                            name="type" type="text" class="form-control
                                                            @error('type') is-invalid @enderror">

                                                            @error('type') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Account Holder </label>
                                                            <input
                                                            value="{{$supplier->account_holder}}"
                                                             name="account_holder" type="text" class="form-control
                                                            @error('account_holder') is-invalid @enderror">

                                                            @error('account_holder') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Account Number </label>
                                                            <input
                                                            value="{{$supplier->account_number}}"
                                                             name="account_number" type="number" class="form-control
                                                            @error('account_number') is-invalid @enderror">

                                                            @error('account_number') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Bank Name </label>
                                                            <input
                                                            value="{{$supplier->bank_name}}"
                                                             name="bank_name" type="text" class="form-control
                                                            @error('bank_name') is-invalid @enderror">

                                                            @error('bank_name') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier Bank Branch </label>
                                                            <input
                                                            value="{{$supplier->bank_branch}}"
                                                             name="bank_branch" type="text" class="form-control
                                                            @error('bank_branch') is-invalid @enderror">

                                                            @error('bank_branch') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Supplier City </label>
                                                            <input
                                                            value="{{$supplier->city}}"
                                                             name="city" type="text" class="form-control
                                                            @error('city') is-invalid @enderror">

                                                            @error('city') <span> {{$message}}</span> @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="example-fileinput" class="form-label">Supplier Image</label>
                                                            <input
                                                             name="image" type="file" id="image" class="form-control">
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
