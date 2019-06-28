@extends('mapa.layout.mapaLayout')

@section('scripts')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/jquery.maphilight.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $('.img-fluid').maphilight({
                alwaysOn: true
            });
        });
    </script>
@endsection

@section('mapa')
    <div class="row">
        <div class="col-sm-12 ">
            <div class="container-fluid align-items-center">
                <div style="width: 100%; height: 500px;">
                    {!! Mapper::render() !!}
                </div>
{{--                <img src="{{asset('images/Capturar.PNG')}}" usemap="#image-map" class="img-fluid">--}}
{{--                <map name="image-map">--}}

{{--                    @foreach($locations as $location)--}}
{{--                        <area target="" alt="" title="@foreach($location->atendimentos as $atendimento) {{$atendimento->tecnico->user->name}}@endforeach" href="{{route('whoIsOnLocation',$location->id)}}" coords="{{$location->coord}}" shape="rect">--}}
{{--                    @endforeach--}}


{{--                    --}}{{--        <area target="" alt="bloco1" title="bloco1" href="bloco1" coords="550,431,466,349" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco2" title="bloco2" href="bloco1" coords="640,317,699,340" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco3" title="bloco3" href="" coords="745,370,769,385" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco4" title="bloco4" href="" coords="640,415,693,459" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco5" title="bloco5" href="" coords="716,417,741,454" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco6" title="bloco6" href="" coords="774,411,827,516" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco7" title="bloco7" href="" coords="619,479,646,586" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco8" title="bloco8" href="" coords="650,460,686,573" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco9" title="bloco9" href="" coords="695,463,733,571" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco10" title="bloco10" href="" coords="563,629,734,657" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco11" title="bloco11" href="" coords="630,675,699,702" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco12" title="bloco12" href="" coords="719,677,792,703" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco13" title="bloco13" href="" coords="806,636,821,694" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco14" title="bloco14" href="" coords="868,709,843,341" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco15" title="bloco15" href="" coords="886,734,918,783" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco16" title="bloco16" href="" coords="935,712,1074,766" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco17" title="bloco17" href="" coords="903,659,1080,685" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="anexo1" title="anexo1" href="" coords="208,619,254,687" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="anexo2a" title="anexo2a" href="" coords="369,320,446,607" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="anexo2b" title="anexo2b" href="" coords="465,449,504,571" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="bloco18" title="bloco18" href="" coords="1094,659,1151,689" shape="rect">--}}
{{--                    --}}{{--        <area target="" alt="edPrincipal" title="edPrincipal" href="" coords="67,482,305,595" shape="rect">--}}
{{--                </map>--}}
            </div>
        </div>
    </div>
@endsection