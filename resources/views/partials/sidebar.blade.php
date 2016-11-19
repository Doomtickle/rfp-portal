<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-stacked">
        <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">Analytics</a></li>
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="/clients/all" role="button" aria-haspopup="true" aria-expanded="false">
                Clients <span class="caret pull-right"></span>
            </a>
            <ul class="dropdown-menu">
                <?php $clients = App\Client::all();?>
                <li><a href="/clients/all">View All</a></li>
                @foreach ($clients as $client)
                    <li><a href="#">{{ $client->name }}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>
</div>
