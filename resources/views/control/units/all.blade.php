@extends('control.master')


@section('content')
 <div class="title_left">
                <h3>All Units <small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Units <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <!--<p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>-->

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                           
                            <th class="column-title">Unit Type </th>
                            <th class="column-title">Status </th>
                             <th class="column-title">Country </th>
                              <th class="column-title">Furnished </th>
                             <th class="column-title">View Details </th>
                            <th class="column-title">Update </th>
                            <th class="column-title">Delete</th>
                            
                           
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          
                         
                         
                         
                         
                          @unless(empty($units))

                          @foreach($units as $u)
                         

                          <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">{{$u->uType}}</td>
     <td class=" ">{{$u->uTypeStatus}}
     </td>
     <td class=" ">{{$u->uCountry}}</td>  
     <td class=" ">{{$u->uFurnished}}</td>                          
                            <td class=" "> <button type="button" class="btn btn-primary">View Details</button></td>
                            <td class=" "><button type="button" class="btn btn-warning">Update</button></td>
                            <td class=" "> <button type="button" class="btn btn-danger">Delete                        </button></td>
                          
                            
                          </tr>


                          @endforeach

                          @endunless
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->





@stop