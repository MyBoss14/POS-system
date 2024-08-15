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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>

                                            <li class="breadcrumb-item active">Add Advance Salary</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Employee</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">


                            <div class="col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="tab-pane" id="settings">
                                            <form method="POST" action="{{route('advance.salary.store')}}"  enctype="multipart/form-data">
                                                @csrf
                                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Advance Salary</h5>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Employee Name <code>*</code></label>
                                                            <select  name="employee_id" class="form-select @error('employee_id')
                                                                is-invalid
                                                            @enderror
                                                            "  id="example-select">
                                                                <option selected disabled> SELECT EMPLOYEE</option>
                                                                @foreach ($employee as $item )
                                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="mb-3 col-6">
                                                        <label class="form-label">Date <code>select a date</code></label>
                                                        <input name="date" type="text" id="humanfd-datepicker"  placeholder="{{$currentDate}}" class="form-control @error('date') is-invalid @enderror">

                                                        @error('date') <span> {{$message}}</span> @enderror
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">Add Advance salary<code>*</code>₱</label>
                                                            <input name="advance_salary" type="number" class="form-control
                                                            @error('advance_salary') is-invalid @enderror">

                                                            @error('advance_salary') <span> {{$message}}</span> @enderror
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
