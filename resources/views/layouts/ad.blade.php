@push('scripts')
    <script type="text/javascript" src="{{ asset('js/ad-popup.js') }}"></script>
@endpush


<br>
@for($i = $start; $i <= $end && $i < count($ads); $i++)

    @if($align == 'left')

        <div class="ad-popover" title="Купон на скидку" data-toggle="popover" data-content="{{$ads[$i]->coupon}}
                примените и получите скидку 10%" data-placement="right">

            <div class="card card-body" style="border: 0.7px solid #FFA500; padding: 5px; text-align: center" >
                <h5 style="font-weight: 600" class="card-title">{{$ads[$i]->product}}</h5>
                <h5 class="card-title price">{{$ads[$i]->price}}&#8372;</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$ads[$i]->supplier}}</h6>
                <p class="card-text">{{$ads[$i]->description}}</p>
                <a href="#" class="card-link">{{$ads[$i]->website}}</a>
            </div>
        </div>

    @else

        <div class="ad-popover" title="Купон на скидку" data-toggle="popover" data-content="{{$ads[$i]->coupon}}
                примените и получите скидку 10%" data-placement="left">

             <div class="card card-body" style="border: 0.7px solid #FFA500; padding: 5px; text-align: center" >
                <h5 style="font-weight: 600" class="card-title">{{$ads[$i]->product}}</h5>
                <h5 class="card-title price">{{$ads[$i]->price}}&#8372;</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$ads[$i]->supplier}}</h6>
                <p class="card-text">{{$ads[$i]->description}}</p>
                <a href="#" class="card-link">{{$ads[$i]->website}}</a>
            </div>
        </div>

    @endif
    <br>

@endfor







