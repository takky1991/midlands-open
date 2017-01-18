@extends('layouts.bjj')

@section('container')

    <div class="bjj-rules-page">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Rules</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li>No-GI Submission Only</li>
                    <li>All matches 5 minutes</li>
                    <li>If there is no winner in regular time we enter Sudden Death</li>
                    <li>Sudden Death starts straight away – No Stalling</li>
                    <li>In Sudden Death each competitor gets a chance in an attacking position (Back or Armbar)</li>
                    <li>Quickest Submission Wins</li>
                    <li>If there is no submission – quickest escape wins</li>
                    <li>Coin toss to decide who goes first in Sudden Death</li>
                    <li>Only Straight Footlocks for Novice or White Division</li>
                    <li>No Heelhooks or Knee Reaping for Blue Division</li>
                    <li>All Submissions for Purple and Above</li> 
                    <li>Weigh in just before your fight</li>
                    <li>If you miss weight you are automatically disqualified</li>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Divisions</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li>White less than 6 months</li>
                    <li>White</li> 
                    <li>Blue</li> 
                    <li>Purple</li> 
                    <li>Brown/Black</li>
                </ul>
                <p>If you are unsure about which division to enter please <a href="{{route('bjj_contact')}}">contact us</a>.</p>
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
                        <li>-80kg Middle Weight</li> 
                        <li>-85kg Light Heavy</li>
                        <li>-90kg Heavy</li>
                        <li>+90kg Super Heavy</li>
                    </ul>
                </div>
                
                <div class="col-sm-6">
                    <h5>FEMALE</h5>
                    <ul>
                        <li>-55kg Fly Weight</li>
                        <li>-60kg Bantam Weight</li>
                        <li>-65kg Feather Weight</li>
                        <li>-70kg Light Weight</li>
                        <li>-75kg Welter Weight</li>
                        <li>-80kg Middle Weight</li>
                        <li>+80kg Heavy Weight</li>
                    </ul>
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
                        <li>Early registration fee: €20</li>
                        <li>Late registration fee: €25</li>
                    </ul>
                    <li>Adult 18 - 34</li>
                    <ul>
                        <li>Early registration fee: €30</li>
                        <li>Late registration fee: €40</li>
                    </ul>
                    <li>Master 35 +</li>
                    <ul>
                        <li>Pricing is the same as for Adults</li>
                    </ul>
                    <p>Registration will close 48 hours before event start, unless capacity is reached before.</p>
                </ul>
            </div>
        </div>

        <p>If you have any questions regarding the rules please <a href="{{route('bjj_contact')}}">contact us</a>.</p>
    </div>

@endsection