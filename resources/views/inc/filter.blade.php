<div class="container">


    <form action="">
        <div class="select-container">
            <select id="newstype">
                <option>{{\App\Constants\GlobalConstants::ALL}}</option>
                @foreach(\App\Constants\GlobalConstants::LIST_COUNTRIES as $range)
                <option>{{$range}}</option>
                @endforeach
            </select>
    </form>
</div>