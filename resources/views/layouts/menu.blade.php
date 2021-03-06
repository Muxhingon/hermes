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
                <a class="navbar-brand" href="{{url('/')}}"><img  width="200px" style=" padding-top:-10px" src="{{asset('logo.png')}}" /></a>
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

            <div class="navbar-default sidebar" role="navigation" id="completo">
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
                          @if($path == "user")
                            <a class="active" href="{{ url('/user') }}"><i class="fa fa-th-list fa-fw"></i> Usuarios</a>
                          @else
                            <a href="{{ url('/user') }}"><i class="fa fa-th-list fa-fw"></i> Usuarios</a>
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

                            @if($path == "nda/control")
                              <li>
                                <a class="active" href="{{ url('/nda/control') }}"><i class="fa fa-file fa-fw"></i> Gestión y Control </a>
                              </li>

                            @else
                              <li>
                                <a href="{{ url('/nda/control') }}"><i class="fa fa-file fa-fw"></i> Gestión y Control </a>
                              </li>
                            @endif


                            @if($path == "nda/operaciones")
                              <li>
                                <a class="active" href="{{ url('/nda/operaciones') }}"><i class="fa fa-file fa-fw"></i> Operaciones </a>
                              </li>

                            @else
                              <li>
                                <a href="{{ url('/nda/operaciones') }}"><i class="fa fa-file fa-fw"></i> Operaciones </a>
                              </li>
                            @endif


                            @if($path == "nda/facturacion")
                              <li>
                                <a class="active" href="{{ url('/nda/facturacion') }}"><i class="fa fa-file fa-fw"></i> Facturación </a>
                              </li>

                            @else
                              <li>
                                <a href="{{ url('/nda/facturacion') }}"><i class="fa fa-file fa-fw"></i> Facturación </a>
                              </li>
                            @endif

                            @if($path == "nda/mensajero")
                              <li>
                                <a class="active" href="{{ url('/nda/mensajero') }}"><i class="fa fa-file fa-fw"></i> Mensajero </a>
                              </li>

                            @else
                              <li>
                                <a href="{{ url('/nda/mensajero') }}"><i class="fa fa-file fa-fw"></i> Mensajero </a>
                              </li>
                            @endif


                            @if($path == "nda/intendencia")
                              <li>
                                <a class="active" href="{{ url('/nda/intendencia') }}"><i class="fa fa-file fa-fw"></i> Intendencia </a>
                              </li>

                            @else
                              <li>
                                <a href="{{ url('/nda/intendencia') }}"><i class="fa fa-file fa-fw"></i> Intendencia </a>
                              </li>
                            @endif

                            @if($path == "nda/asistente")
                              <li>
                                <a class="active" href="{{ url('/nda/asistente') }}"><i class="fa fa-file fa-fw"></i> Asistente y Mensajero de DG </a>
                              </li>

                            @else
                              <li>
                                <a href="{{ url('/nda/asistente') }}"><i class="fa fa-file fa-fw"></i> Asistente y Mensajero de DG </a>
                              </li>
                            @endif


                            @if($path == "nda/compras")
                              <li>
                                <a class="active" href="{{ url('/nda/compras') }}"><i class="fa fa-file fa-fw"></i> Compras y Almacén</a>
                              </li>

                            @else
                              <li>
                                <a href="{{ url('/nda/compras') }}"><i class="fa fa-file fa-fw"></i> Compras y Almacén </a>
                              </li>
                            @endif



                          </ul>
                        </li>

                        <li>
                          <a href="#" ><i class="fa fa-list-alt fa-fw" ></i>TIC</a>
                          @if(str_contains($path,"TIC/"))
                            <ul class="nav nav-second-level in">
                          @else
                            <ul class="nav nav-second-level">
                          @endif

                          @if($path == "TIC/contrato")
                            <li>
                              <a class="active" href="{{ url('/TIC/contrato') }}"><i class="fa fa-file fa-fw"></i> Contrato  </a>
                            </li>

                          @else
                            <li>
                              <a href="{{ url('/TIC/contrato') }}"><i class="fa fa-file fa-fw"></i> Contrato </a>
                            </li>
                          @endif

                          @if($path == "TIC/nda")
                            <li>
                              <a class="active" href="{{ url('/TIC/nda') }}"><i class="fa fa-file fa-fw"></i> NDA  </a>
                            </li>

                          @else
                            <li>
                              <a href="{{ url('/TIC/nda') }}"><i class="fa fa-file fa-fw"></i> NDA </a>
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
