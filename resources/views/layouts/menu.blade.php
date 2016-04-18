<?php $path = Route::getCurrentRoute()->getPath();?>
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">Hermes</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}}   {{Auth::user()->lastname}}   <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li>
                          @if($path == '/')
                            <a class="active" href="{{ url('/') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                          @else
                          <a  href="{{ url('/') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                          @endif
                        </li>

                        <li>
                          @if($path == "register")
                            <a class="active" href="{{ url('/register') }}"><i class="fa fa-th-list fa-fw"></i> Usuarios</a>
                          @else
                            <a href="{{ url('/register') }}"><i class="fa fa-th-list fa-fw"></i> Usuarios</a>
                          @endif
                        </li>

                        <li>
                          <a href="#" ><i class="fa fa-list-alt fa-fw" ></i>Convenios NDA</a>
                          @if(str_contains($path,"nda/"))
                            <ul class="nav nav-second-level in">
                          @else
                            <ul class="nav nav-second-level">
                          @endif


                            @if($path == "nda/general")
                              <li>
                                <a class="active" href="{{ url('/nda/general') }}"><i class="fa fa-file fa-fw"></i> General </a>
                              </li>

                            @else
                              <li>
                                <a href="{{ url('/nda/general') }}"><i class="fa fa-file fa-fw"></i> General</a>
                              </li>
                            @endif

                            @if($path == "nda/coordinacionAdministrativa")
                              <li>
                                <a class="active" href="{{ url('/nda/coordinacionAdministrativa') }}"><i class="fa fa-file fa-fw"></i> Coordinacón Administrativa </a>
                              </li>

                            @else
                              <li>
                                <a href="{{ url('/nda/coordinacionAdministrativa') }}"><i class="fa fa-file fa-fw"></i> Coordinacón Administrativa </a>
                              </li>
                            @endif


                            @if($path == "nda/contabilidad")
                              <li>
                                <a class="active" href="{{ url('/nda/contabilidad') }}"><i class="fa fa-file fa-fw"></i> Contabilidad </a>
                              </li>

                            @else
                              <li>
                                <a href="{{ url('/nda/contabilidad') }}"><i class="fa fa-file fa-fw"></i> Contabilidad </a>
                              </li>
                            @endif


                            @if($path == "nda/planeacion")
                              <li>
                                <a class="active" href="{{ url('/nda/planeacion') }}"><i class="fa fa-file fa-fw"></i> Dirección de Planeación </a>
                              </li>

                            @else
                              <li>
                                <a href="{{ url('/nda/planeacion') }}"><i class="fa fa-file fa-fw"></i> Dirección de Planeación </a>
                              </li>
                            @endif



                          </ul>
                        </li>



                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
