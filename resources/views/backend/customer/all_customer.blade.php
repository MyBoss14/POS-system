@extends('admin_dashboard')
@section('admin')

<!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->


                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row pb-1">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right ">
                                        <h4>

                                            <a href="{{route('add.customer')}}" class="btn btn-outline-primary rounded-pill waves-effect waves-light"fdprocessedid="dsw5vh"> <b>ADD CUSTOMER</b> </a>
                                        </h4>
                                    </div>
                                    <h4 class="page-title">All Customer</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">


                                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>S1</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>ShopName</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($customer as $key=> $item)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td><img src="{{asset($item->image)}}" alt="" style="width: 50px; height:40px;"></td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td>{{$item->phone}}</td>
                                                    <td>{{$item->shop_name}}</td>
                                                    <td>
                                                        <a href="{{route('edit.customer',$item->id)}}" class="btn btn-soft-info rounded-pill waves-effect waves-light" fdprocessedid="io1mu">EDIT</a>

                                                        <a href="{{route('delete.customer',$item->id)}}" class="btn btn-soft-danger rounded-pill waves-effect waves-light"fdprocessedid="5krrt" id="delete">DEL</a>
                                                    </td>

                                                </tr>
                                                @endforeach


                                            </tbody>
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
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
