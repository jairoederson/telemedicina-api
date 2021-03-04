

@if (empty($videos))
<div class="col-md-12">
<div class="row">
    <div class="message-chat">Video No disponible se esta procesando.. </div>
</div>
</div>
@else
@foreach($videos as $video)
<video width="400" controls style="background-color: #fafafa">
    <source src="{{ $video }}" type="video/mp4">
    <source src="" type="video/ogg">
</video><br>

<a href="{{ $video }}" class="format btn btn-format">Download</a>
@endforeach
@endif