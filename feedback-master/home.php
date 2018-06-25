<?php
  // include "php/includes/config.php";
  include "php/includes/sessionUtils.php";
  
  $session = new sessionUtils();
  
  $session->checkSession($_SESSION["user_regno"]);
  $id = $_SESSION["user_id"];
  $regno = $_SESSION["user_regno"];
  $year = $_SESSION["user_year"];
  $sec = $_SESSION["user_sec"];
  $sem = $_SESSION["user_sem"];
  // echo $sem;
  
  $db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_BASE) or die("Cannot connect to db..");
  $subjectQuery = "SELECT * FROM subjects WHERE semester = '$sem'";
  $sub_res = mysqli_query($db,$subjectQuery);
  $subject_res = mysqli_query($db,$subjectQuery);
?>
<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Feedback</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-pink.min.css">
    <link rel="stylesheet" href="css/styles2.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
          <h3>Name &amp; Title</h3>
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
          <?php while ($sub_arr = mysqli_fetch_array($sub_res)) { ?>
            <a href="#<?=$sub_arr['subject_name']?>" class="mdl-layout__tab"><?=$sub_arr['subject_name']?></a>
          <?php } ?>
        </div>
      </header>
      <main class="mdl-layout__content">
        <?php while ($subject_arr = mysqli_fetch_array($subject_res)) { ?>
          <div class="mdl-layout__tab-panel" id="<?=$subject_arr['subject_name']?>">
            <section class="section--center mdl-grid mdl-grid--no-spacing">
              <div class="mdl-cell mdl-cell--12-col">
                <form id="feedbackForm" name="feedbackForm" method="post" action="php/updateFB.php">
                  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                    <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric"></th>
                        <th class="mdl-data-table__cell--non-numeric">C01</th>
                        <th class="mdl-data-table__cell--non-numeric">C02</th>
                        <th class="mdl-data-table__cell--non-numeric">C03</th>
                        <th class="mdl-data-table__cell--non-numeric">C04</th>
                        <th class="mdl-data-table__cell--non-numeric">C05</th>
                        <th class="mdl-data-table__cell--non-numeric">C06</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php for ($i=1; $i <= 12; $i++) { ?>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric mdl-typography--font-bold">PO<?=$i?></td>
                            <td>
                              <input type="radio" id="co1" class="mdl-radio__button" name="co1" value="1">
                              <input type="radio" id="co1" class="mdl-radio__button" name="co1" value="2">
                              <input type="radio" id="co1" class="mdl-radio__button" name="co1" value="3">
                            </td>
                            <td>
                              <input type="radio" id="co2" class="mdl-radio__button" name="co2" value="1">
                              <input type="radio" id="co2" class="mdl-radio__button" name="co2" value="2">
                              <input type="radio" id="co2" class="mdl-radio__button" name="co2" value="3">
                            </td>
                            <td>
                              <input type="radio" id="co3" class="mdl-radio__button" name="co3" value="1">
                              <input type="radio" id="co3" class="mdl-radio__button" name="co3" value="2">
                              <input type="radio" id="co3" class="mdl-radio__button" name="co3" value="3">
                            </td>
                            <td>
                              <input type="radio" id="co4" class="mdl-radio__button" name="co4" value="1">
                              <input type="radio" id="co4" class="mdl-radio__button" name="co4" value="2">
                              <input type="radio" id="co4" class="mdl-radio__button" name="co4" value="3">
                            </td>
                            <td>
                              <input type="radio" id="co5" class="mdl-radio__button" name="co5" value="1">
                              <input type="radio" id="co5" class="mdl-radio__button" name="co5" value="2">
                              <input type="radio" id="co5" class="mdl-radio__button" name="co5" value="3">
                            </td>
                            <td>
                              <input type="radio" id="co6" class="mdl-radio__button" name="co6" value="1">
                              <input type="radio" id="co6" class="mdl-radio__button" name="co6" value="2">
                              <input type="radio" id="co6" class="mdl-radio__button" name="co6" value="3">
                            </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <div class="mdl-card__actions mdl-card--border mdl-color-text--white">
                    <a href="#" onclick="document.getElementById('feedbackForm').submit()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                      <i class="material-icons">done_all</i> Submit
                    </a>
                  </div>
                </form>
              </div>
            </section>
          </div>
        <?php } ?>
        <footer class="mdl-mega-footer">
          <div class="mdl-mega-footer--bottom-section">
            <div class="mdl-logo">
              More Information
            </div>
            <ul class="mdl-mega-footer--link-list">
              <li><a href="https://developers.google.com/web/starter-kit/">Web Starter Kit</a></li>
              <li><a href="#">Help</a></li>
              <li><a href="#">Privacy and Terms</a></li>
            </ul>
          </div>
        </footer>
      </main>
    </div>
    <a href="https://github.com/google/material-design-lite/blob/mdl-1.x/templates/text-only/" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">View Source</a>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  </body>
</html>
