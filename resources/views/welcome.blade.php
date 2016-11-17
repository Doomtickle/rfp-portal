@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-offset-1 col-md-10">
            <div class="content">
                <h1 style="font-family:Raleway, sans-serif; font-weight:100;font-size:78px;text-align:center;margin-bottom:10vh;"> KMA Media Portal</h1>
                <p style="font-size:20px;font-weight:100">Valued KMA Media Partner,<br><br>
                    Our Media Purchasing Portal has been designed with you in mind to facilitate an efficient purchasing
                    process with features including:
                <ul class="feature-list m-b-md">
                    <li class="feature-list-item">Secure vendor login to your personal account via HTTPS/SSL
                        connection.
                    </li>
                    <li class="feature-list-item">The assurance that your proposal will be received by KMA.</li>
                    <li class="feature-list-item">Fast review and reply</li>
                </ul>
                </p>
                <div style="text-align:center;">
                    <a  href="/register" class="btn btn-primary">Get Started  &gt;</a>
                </div>

                <div class="links" style="text-align:center; padding-top:30px;">
                    <a style="padding:10px 15px;" href="https://keriganmarketing.com">Main Site</a>
                    <a style="padding:10px 15px;" href="https://keriganmarketing.com/portfolio/">Our Work</a>
                    <a style="padding:10px 15px;" href="https://keriganmarketing.com/freelunch/">News</a>
                </div>
            </div>
        </div>
    </div>
@endsection
