<li class="dropdown messages-menu country-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <b>{{ucfirst($currentLocale)}}</b>
    </a>
    <ul class="dropdown-menu">
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">

                @foreach($languages as $key => $language)
                    <li><!-- start message -->
                        <a class="language" href="#" data-id="{{$key}}" >
                            {{$language}}
                            @if($key == $currentLocale)
                                <i class="fa fa-check pull-right"></i>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</li>
<li class="dropdown messages-menu country-menu">
    <a href="#" class="dropdown-toggle country-switcher" data-toggle="dropdown">
        @if($currentCountry && App::getLocale())
            <b>{{$countries[$currentCountry]['title_'.App::getLocale()]}}
                <img src="{{asset($countries[$currentCountry]['flag'])}}" alt="{{Cookie::get('country')}}"/>
            </b>
        @endif
    </a>
    <ul class="dropdown-menu">
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">

                @foreach($countries as $key => $country)
                    <li><!-- start message -->
                        <a class="country" href="#" data-id="{{$key}}" >
                            {{$country['title_'.App::getLocale()]}}
                            @if($key == $currentCountry)
                                <i class="fa fa-check pull-right"></i>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</li>
<li class="dropdown messages-menu country-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        @if($currentModule && App::getLocale())
            <b>{{$modules[$currentModule][App::getLocale()]}}</b>
        @endif
    </a>
    <ul class="dropdown-menu">
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">

                @foreach($modules as $key => $module)
                    <li><!-- start message -->
                        <a class="modules" href="#" data-id="{{$key}}" >
                            {{$module[App::getLocale()]}}
                            @if($key == $currentModule)
                                <i class="fa fa-check pull-right"></i>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
</li>
<script>
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    $(".language").click(function () {
        let id = $(this).data('id');
        $.post("{{ admin_url('/locale') }}",{_token:LA.token, locale: id}, function () {
            location.reload();
        })
    })
    $(".country").click(function () {
        let id = $(this).data('id');
        $.post("{{ admin_url('/country') }}",{_token:LA.token, country: id}, function () {
            location.reload();
        })
    })
    $(".modules").click(function () {
        let id = $(this).data('id');
        $.post("{{ admin_url('/module') }}",{_token:LA.token, module: id}, function () {
            location.reload();
        })
    })
</script>
