<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Betslap</title>
  <meta name="description" content="Da shit">
  <meta name="author" content="">
  <link href="/betslap/Ionian-Ionian/Project/Views/css/bootstrap.css" rel="stylesheet">
  <link href="/betslap/Ionian-Ionian/Project/Views/css/style.css" rel='stylesheet' type='text/css'>
  <script src="/betslap/Ionian-Ionian/Project/Views/js/bootstrap.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-8 oddsSports">
          <div class="oddsBorder">
              <p class="oddsborderText">Fotboll</p>
          </div>
          <div class="col-md-12 oddsLeague">
              <p class="oddsLeagueText">Primera Division</p>
          </div>
          <table class="table oddsGames">
              <thead>
              <tr>
                  <th class="tableHeadline">Start</th>
                  <th class="tableHeadline">Match</th>
                  <th class="tableHeadline">
                      <div class="col-md-12 oneXTwo">
                          <p class="col-md-4 bet1x2">1</p>
                          <p class="col-md-4 bet1x2">X</p>
                          <p class="col-md-4 bet1x2">2</p>
                      </div>
                  </th>
              </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>19.00</td>
                      <td>Man U - Chelsea</td>
                      <td>
                          <div class="btn-group oneXTwoButtons" data-toggle="buttons">
                              <label class="btn btn-primary oneXTwoButton">
                                  <input type="checkbox" autocomplete="off">2.30
                              </label>
                              <label class="btn btn-primary oneXTwoButton">
                                  <input type="checkbox" autocomplete="off">3.04
                              </label>
                              <label class="btn btn-primary oneXTwoButton">
                                  <input type="checkbox" autocomplete="off"> 2.56
                              </label>
                          </div>
                      </td>
                  </tr>
                  <tr>
                      <td>20:00</td>
                      <td>Liverpool - Tottenham</td>
                      <td>
                          <div class="btn-group oneXTwoButtons" data-toggle="buttons">
                              <label class="btn btn-primary oneXTwoButton">
                                  <input type="checkbox" autocomplete="off">2.30
                              </label>
                              <label class="btn btn-primary oneXTwoButton">
                                  <input type="checkbox" autocomplete="off">3.04
                              </label>
                              <label class="btn btn-primary oneXTwoButton">
                                  <input type="checkbox" autocomplete="off"> 2.56
                              </label>
                         </div>
                      </td>
                  </tr>
              </tbody>
          </table>

      </div>
      <div class="col-md-4 oddsSports myBets">
          <div class="betBorder">
              <p class="oddsborderText">Mina Bet</p>
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
          <div class="col-md-12 coupon">
              <div class="couponContent">
                  <p class="couponGame">Arsenal - Crystal Palace</p>
                  <button type="submit" class="btn btn-primary btn-xs deleteButton">X</button>
                  <p class="fullTime">Full tid</p>
                  <p class="couponInfo">Oavgjort</p>
                  <p class="couponOdds">3.00</p>
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
      <div class="col-md-8 oddsSports">
          <div class="oddsBorder">
              <p class="oddsborderText">Hockey</p>
          </div>
          <div class="col-md-12 oddsLeague">
              <p class="oddsLeagueText">NHL</p>
          </div>
          <table class="table oddsGames">
              <thead>
              <tr>
                  <th class="tableHeadline">Start</th>
                  <th class="tableHeadline">Match</th>
                  <th class="tableHeadline">
                      <div class="col-md-12 oneXTwo">
                          <p class="col-md-4 bet1x2">1</p>
                          <p class="col-md-4 bet1x2">X</p>
                          <p class="col-md-4 bet1x2">2</p>
                      </div>
                  </th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <td>19.00</td>
                  <td>Man U - Chelsea</td>
                  <td>
                      <div class="btn-group oneXTwoButtons" data-toggle="buttons">
                          <label class="btn btn-primary oneXTwoButton">
                              <input type="checkbox" autocomplete="off">2.30
                          </label>
                          <label class="btn btn-primary oneXTwoButton">
                              <input type="checkbox" autocomplete="off">3.04
                          </label>
                          <label class="btn btn-primary oneXTwoButton">
                              <input type="checkbox" autocomplete="off"> 2.56
                          </label>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>20:00</td>
                  <td>Liverpool - Tottenham</td>
                  <td>
                      <div class="btn-group oneXTwoButtons" data-toggle="buttons">
                          <label class="btn btn-primary oneXTwoButton">
                              <input type="checkbox" autocomplete="off">2.30
                          </label>
                          <label class="btn btn-primary oneXTwoButton">
                              <input type="checkbox" autocomplete="off">3.04
                          </label>
                          <label class="btn btn-primary oneXTwoButton">
                              <input type="checkbox" autocomplete="off"> 2.56
                          </label>
                      </div>
                  </td>
              </tr>
              </tbody>
          </table>
      </div>
    </div>
  </div>

  <script src="/betslap/Ionian-Ionian/Project/Views/js/bootstrap.js" type="text/javascript"></script>

</body>
</html>
