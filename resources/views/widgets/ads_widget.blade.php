<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($ads as $ad)
            <div class="carousel-item   {{$loop->first?'active':''}} " data-interval="{{$ad->duration * 1000}}">
                <a href="{{  route('ad.get',$ad->id)}}">
                    <div class="text-center">
                        <img
                            src="{{asset($ad->image)}}"
                            alt="{{$ad->title}}"
                            class="rounded"
                            height="200"
                            width="200">
                    </div>

                </a>
            </div>
        @endforeach
    </div>
</div>


<script type="text/javascript">

    var t;

    var start = $('#myCarousel').find('.active').attr('data-interval');
    t = setTimeout("$('#myCarousel').carousel({interval: 1000});", start - 1000);

    $('#myCarousel').on('slid.bs.carousel', function () {
        clearTimeout(t);
        var duration = $(this).find('.active').attr('data-interval');

        console.log(duration);

        $('#myCarousel').carousel('pause');
        t = setTimeout("$('#myCarousel').carousel();", duration - 1000);
    })

    $('.carousel-control-next').on('click', function () {
        clearTimeout(t);
    });

    $('.carousel-control-prev').on('click', function () {
        clearTimeout(t);
    });
</script>




