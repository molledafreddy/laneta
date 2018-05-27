
{{-- 
	<div class="row">		
		@foreach($posts as $element)
		<div class="col-md-12">
			<div class="card card-notice mb-4 box-shadow">
					<div class="card-header">
                        <div class="user-data mb-4">
                            <img class="user-image" src="{{ $element->user->image }}" alt="{{ $element -> user -> username }}">
                            <a class="btn btn-link" href="{{ route('profile', $element -> user -> username) }}">{{ $element->user->first_name . ' ' . $element->user->last_name  }} </a class="btn btn-link" href="{{ route('profile.show', $element->user->username) }}"> 
                            <small class="text-muted">{{ $element->created_at }}</small>
                        </div>
						<p class="card-title">{{ $element->title }}</p>
                        <span class="data text-muted">{{ $element->location }}</span>
					</div> 

                    <?php $i = 0; ?>
                    <div class="gallery-container">
                        <div class="tz-gallery gallery{{ $element->id }}">
                            <div class="row">
                                @foreach($element->media AS $media)

                                    @if($media->type == 'P')

                                        <?php
                                            $col = 12;
                                            if(count($element->media) == 2) {
                                                $col = 6;
                                            } else {
                                                if(count($element->media) == 3) {
                                                    $col = 4;
                                                }
                                            }
                                        ?>

                                       <div class="col-sm-12 col-md-{{ $col }}">          
                                            <a class="lightbox" href="{{ asset('img/media/' . $media->media) }}">
            					               <img src="{{ asset('img/media/' . $media->media) }}" alt="{{ $media->id }}">
                                            </a>
                                        </div>

                                    @else
                                    @endif    
                                @endforeach

                                <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
                                <script>
                                    baguetteBox.run('.gallery{{ $element->id }}');
                                </script>
                            </div>
                        </div>
                    </div>
					<div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-4">
                                <i class="fas fa-heart"></i> {{count($element->likes)}}
                            </div>
                            <div class="col-md-4">
                                <i class="fas fa-comment"></i> {{count($element->comments)}}
                            </div>
                            <div class="col-md-4">                                
                                <i class="fas fa-eye"></i> {{count($element->views)}}
                            </div>
                        </div>
                            <hr>
						<div class="card-text">{!! $element->description !!}</div>



    <!-- aquí mostramos el preloader -->
    <div style="margin: 10px 0px 0px 48%" class="before"></div> 
    <!-- aquí guardamos el último id, hay muchas formas de hacer esto --> 
    <div class="lastId" style="display:none" id="{{ $id }}"></div>
    <!-- aquí guardamos la ruta para dar like --> 
    <div class="routePath" style="display:none" id="{{ $route }}"></div>
    <div class="auth" style="display:none" id="{{ $auth }}"></div>

                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                        <form  class="form-horizontal" action="{{ route('comment.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="post_id" value="{{ $element->id }}"/>

                            <div class="input-group">
                                <input type="text" class="form-control  input-outline-primary" name="comment" placeholder="Escribe un comentario...">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-paper-plane"></i></button>
                                </div>
					        </div>
                            @if ($errors->has('comment'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('comment') }}</strong>
                                </span>
                            @endif
                        </form>
                        <hr/>

                        <ul class="list-unstyled"> 
                            <li>

                                <?php $content_url = str_replace(' ',"%20",$element->title); ?>

                                <a href="https://twitter.com/home?status={{ $content_url }} pic.twitter.com/9Ee63f7aVp" title="Compartir en Twitter" target="_black" data-size="large">
                                    <i class="fab fa-twitter-square fa-2x"></i>
                                </a>
                                <!--<a href="http://www.facebook.com/sharer.php?u=url_pagina&t=titulo_contenido" title="Compartir en Facebook" target="_black">
                                    <i class="fab fa-facebook-square fa-2x"></i>
                                </a>-->
                            </li>
                        </ul>

					</div>
			</div>
		</div>

		@endforeach
	</div>
    <div class="row">
    <div class="col-lg-12">
        <div class="text-center float-right">
            {{ $posts -> links() }}
        </div>
    </div>

    
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/fileinput.min.js') }}"></script>

<script type="text/javascript"> 
    $(document).on('ready', function() {
        $("#imagen").fileinput({
            showUpload: false,
            browseLabel: 'Imagen',
            browseIcon: '<i class="fa fa-folder-open"></i>&nbsp;',
            removeIcon: '<i class="fa fa-trash-o"></i>&nbsp;',
            removeLabel: 'Eliminar Todo',
            layoutTemplates: {
                fileIcon: '<i class="fa fa-file"></i> '
            },
            fileActionSettings : {
                uploadIcon: '<i class="fa fa-upload"></i>',
                uploadClass: 'btn btn-primary btn-xs',
                dragIcon: '<i class="fa fa-bars"></i>',
                dragClass: 'text-info',
                removeClass: 'btn btn-danger btn-xs',
                removeIcon: '<i class="fa fa-trash-o"></i>',
                zoomIcon: '<i class="fa fa-search-plus"></i>',
                zoomClass: 'btn btn-xs btn-info',
                indicatorNew: '<i class="fa fa-hand-o-down"></i>',
                indicatorSuccess: '<i class="fa fa-check-circle fa-lg"></i>',
                indicatorError: '<i class="fa fa-exclamation-circle"></i>',
                uploadRetryIcon: '<i class="fa fa-repeat text-info"></i>',
                indicatorLoading: '<i class="fa fa-hand-o-up"></i>',
                zoomIndicator: '<i class="fa fa-search-plus"></i>',
            },
            fileActionSettings : {
                showDrag: false,
                showZoom: false,
                showUpload: false,
                showDelete: false,
                indicatorNew: "",
                indicatorSuccess: "",
                indicatorError: ""
            }
        });
    });
</script>

    <form id="like" action="{{ route('comment.like') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="comment_id" value="{{ $comment->id }}">                                 
        <input type="hidden" name="stage" value="L">
    </form>   --}}