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
                                <td>
                                    <div class="btn-group oneXTwoButtons" data-toggle="buttons">
                                        <label class="btn btn-primary oneXTwoButton">
                                            <input type="checkbox" autocomplete="off">1
                                        </label>
                                        <label class="btn btn-primary oneXTwoButton">
                                            <input type="checkbox" autocomplete="off">X
                                        </label>
                                        <label class="btn btn-primary oneXTwoButton">
                                            <input type="checkbox" autocomplete="off">2
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4 oddsSports">
                    <div class="betBorder">
                        <p class="oddsborderText">Mitt Bet</p>
                    </div>
                    <div class="col-md-12 coupon">
                        <div class="couponContent">
                            <p class="couponGame">Montreal Canadiens - Boston Bruins</p>
                            <button type="submit" class="btn btn-primary btn-xs deleteButton">X</button>
                            <p class="fullTime">Full tid</p>
                            <p class="couponInfo">Boston Bruins</p>
                            <p class="couponOdds">2.61</p>
                        </div>
                    </div>
                    <div class="col-md-12 total">
                        <div class="totalOdds">
                            <p class="totalText">Totalt Odds</p>
                            <p class="totalTextRight">7.83</p>
                        </div>
                        <div class="totalOdds">
                            <p class="totalText">Insats</p>
                            <input class="totalTextRight" id="betInput" type="text" placeholder="0 SEK" />
                        </div>
                        <div class="totalOdds">
                            <p class="totalText">Potentiell Vinst</p>
                            <p class="totalTextRight" id="totalWin">0 kr</p>
                            <button type="button" class="btn btn-primary btn-sm btn-block betButton">SPELA</button>
                        </div>
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