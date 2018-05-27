@extends('layouts.app')

@section('title', 'Noticias')
@section('content')
	<div class="card card-notice mb-4 box-shadow">
		<div class="card-header">				
			<p class="card-title">{{ $post -> title }}</p>
		</div>
		
		<div class="gallery-container">
                        <div class="tz-gallery gallery{{ $post->id }}">
                            <div class="row">                            	
                                @foreach($post->media AS $media)

                                    @if($media->type == 'P')

                                        <?php
                                            $col = 12;
                                            if(count($post->media) == 2) {
                                                $col = 6;
                                            } else {
                                                if(count($post->media) == 3) {
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
                                    baguetteBox.run('.gallery{{ $post->id }}');
                                </script>
                            </div>
                        </div>
                </div>

		<div class="card-body">
			<p class="card-text">{!! $post->description !!}</p>			
			<small class="text-muted">9 mins</small>
		</div>
	</div>
@endsection