@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('title')
            <small>Admin panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin panel</a></li>
            <li class="active">@yield('title')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
                <!-- Apply any bg-* class to to the info-box to color it -->
                <div class="col-lg-4 col-xs-6">
                     <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="fa fa-thumbs-o-up""></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Like Diarios</span>
                          <span class="info-box-number">{{$count_like_day}}</span>

                          <div class="progress">
                            <div class="progress-bar" style="width: {{$porcentage_like_day}}%"></div>
                          </div>
                          <span class="progress-description">
                                {{$porcentage_like_day}}% del total de likes mensuales
                              </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                </div> 
                <div class="col-lg-4 col-xs-6">
                     <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="fa fa-files-o""></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Post diarios</span>
                          <span class="info-box-number">{{$count_post_day}}</span>

                          <div class="progress">
                            <div class="progress-bar" style="width: {{$porcentage_post_day}}%"></div>
                          </div>
                          <span class="progress-description">
                                {{$porcentage_post_day}}% del total de post mensuales
                              </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                </div> 
                <div class="col-lg-4 col-xs-6">
                     <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-comments-o""></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Comments diarios</span>
                          <span class="info-box-number">{{$count_comment_day}}</span>

                          <div class="progress">
                            <div class="progress-bar" style="width: {{$porcentage_comment_day}}%"></div>
                          </div>
                          <span class="progress-description">
                                {{$porcentage_comment_day}}% del total de comentarios mensuales
                              </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                </div> 
               
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$count_users}}</h3>

                        <p>Usuario registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{ $count_posts}}</h3>
                        <p>Post creados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- TABLE: LATEST ORDERS -->
        <div class="col-lg-6 col-xs-6">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Top post</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ranking</th>
                      </tr>
                      </thead>
                      <tbody>
                        @if ($top_users)
                          @foreach($top_users as $element)  
                              <tr>
                                <td>
                                    <a href="{{route('users.show', $element['user_id'])}}">{{$element['username']}}</a></td>
                                 <td>
                                    {{ $element['name'] }}
                                </td>
                                <td>
                                    <span class="label label-info">{{ $element['count'] }}</span>
                                </td>                                
                              </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
            </div>
            <!-- /.box-body -->            
        </div>
          <!-- /.box -->
        <!-- Main row -->
        <div class="row">
            
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection
