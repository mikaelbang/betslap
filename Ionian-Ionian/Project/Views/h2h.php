<html>
    <head>
        <meta charset="utf-8">
        <title>Betslap</title>
        <meta name="description" content="Da shit">
        <meta name="author" content="">
        <link href="/betslap/Ionian-Ionian/Project/Views/css/bootstrap.css" rel="stylesheet">
        <link href='/betslap/Ionian-Ionian/Project/Views/css/style.css' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="custom-search-input">
                        <div class="input-group col-md-6">
                            <input type="text" class="form-control input-lg" placeholder="Vem vill du utmana?" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h1>Matcher</h1>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Match</th>
                                <th>Bet</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        for($i = 0; $i < 10; $i++){
                        ?>
                            <tr>
                                <td><?php echo($i + 1)?>.</td>
                                <td><?php echo($events[$i]['home_team'] . " - " . $events[$i]['away_team'])?></td>
                                <td><label>1</label><input type="checkbox"/><label>X</label><input type="checkbox"><label>2</label><input type="checkbox"></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 challenge">
                    <h1>Din utmaning</h1>
                    <div class="row">
                        <div class="">
                            <img src="#"/>
                        </div>
                        <div>
                            <p>Utmanarens namn</p>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn btn-info btn-lg" type="button">Skicka utmaning</button>
                    </div>
                </div>
            </div>
            <h1>Vad vill du statsa?</h1>
            <div class="row">
                <select class="selectpicker" data-size="5" style="">
                    <option>Mustard</option>
                    <option>Ketchup</option>
                    <option>Relish</option>
                    <option>Mayonnaise</option>
                    <option>Barbecue Sauce</option>
                    <option>Salad Dressing</option>
                    <option>Tabasco</option>
                    <option>Salsa</option>
                </select>
            </div>
        </div>
    </body>
</html>