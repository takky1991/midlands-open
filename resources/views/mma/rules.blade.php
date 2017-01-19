@extends('layouts.mma')

@section('container')

    <div class="mma-rules-page">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Rules</h3>
            </div>
            <div class="panel-body">
              <ul>
                <li>All matches 5 minutes</li> 
                <li>Divisions will be split into groups of 4 competitors</li> 
                <li>3 Points for a win</li>
                <li>1 point for a draw</li>
                <li>Win can come by submission, referee stoppage, including DQ, corner withdrawal</li>
              </ul>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Equipment Needed</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li>Rash Guard (No t-shirts)</li>
                    <li>Bordshorts or Vale Tudo shorts (not below the knee)</li>
                    <li>6-8 oz Gloves</li>
                    <li>Gumshield</li>
                    <li>Shin & instep pads</li>
                    <li>Groin Guard</li>
                </ul>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Illegal Techniques</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li>No Head Shots (Standing or on the ground)</li>
                    <li>No Elbows</li>
                    <li>No Heelhooks</li>
                    <li>No Twisters / Spinal Twists</li>
                    <li>No Kidney Shots</li>
                </ul>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Divisions</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li>Beginner - 1 year</li>
                    <li>Intermediate - 2 years</li>
                    <li>Advanced +2 years</li>
                </ul>
                <p>If you have ever competed on an amateur show or have trained in any martial art for more than four years please <a href="{{route('mma_contact')}}">contact us</a> to discuss whether this competition is suitable for you.</p>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Weights</h3>
            </div>
            <div class="panel-body">
                <div class="col-sm-6">
                    <h5>MALE</h5>
                    <ul>   
                        <li>-55kg Fly weight</li>
                        <li>-60kg Bantam weight</li>
                        <li>-65kg Feather weight</li>
                        <li>-70kg Light Weight</li>
                        <li>-75kg Welterweight</li>
                        <li>-80kg Middle Weight </li>
                        <li>-85kg Light Heavy</li>
                        <li>-90kg Heavy</li>
                        <li>+90kg Super Heavy</li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <h5>FEMALE</h5>
                    <ul>   
                        <li>-45kg Atom Weight</li>
                        <li>-50kg Straw Weight</li>
                        <li>-55kg Fly Weight </li>
                        <li>-60kg Bantam Weight</li>
                        <li>-65kg Feather Weight</li>
                        <li>-70kg Light Weight</li>
                        <li>-75kg Welter Weight</li>
                        <li>-80kg Middle Weight</li>
                        <li>+80kg Heavy Weight</li>
                    </ul>
                </div>
                <div class="col-xs-12">
                    <p>For divisions with less than 4 competitors you will have the option of moving up a weight class or a full refund</p>
                </div>
            </div>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Age groups</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li>Teens 15 - 17</li>
                    <ul>
                        <li>Early registration fee: €25</li>
                        <li>Late registration fee: €30</li>
                    </ul>
                    <li>Adult 18 - 34</li>
                        <ul>
                            <li>Early registration fee: €40</li>
                            <li>Late registration fee: €50</li>
                        </ul>
                    <li>Master 35 +</li>
                    <ul>
                        <li>Pricing is the same as for Adults</li>
                    </ul>
                    <p>Registration will close 48 hours before event start, unless capacity is reached before.</p>
                </ul>
            </div>
        </div>
        <p>If you have any questions regarding the rules please <a href="{{route('mma_contact')}}">contact us</a>.</p>
    </div>
    
@endsection