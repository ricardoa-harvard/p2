<?php include('utilities.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ricardo Alcantar - Project 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css"/>
  </head>
  <body>
    <div class="container">
      <h1>The Simpsons&trade; Quote Finder</h1>
      <div class="form-container">
        <form class="" action="/" method="get">
          <div>
            <label for="character">Character</label>
            <select name="character" id="character">
              <?php foreach($characters as $character): ?>
                <option value="<?=$character;?>" <?php if($character == $character_filter) echo "selected"?>>
                  <?=$character;?>
                </option>
              <?php endforeach;?>
            </select>
          </div>
          <div>
            <label for="textFilter">Contains Text</label>
            <input type="text" name="textFilter" id="textFilter" value="<?=htmlentities($text_filter);?>" />
          </div>
          <div>
            <label for="showCount">Show Result Count?</label>
            <input type="checkbox" name="showCount" id="showCount" <?php if($show_count) echo 'checked'; ?>/>
          </div>
          <input type="submit" value="Submit" />
        </form>
      </div>
      <?php if($show_count):?>
        <div class="alert alert-info" role="alert">
          <strong>Result count:</strong> <?=$result_count?>
        </div>
      <?php endif;?>
      <ul>
        <?php foreach ($quotes as $quote): ?>
          <li class="quote-container <?=strtolower($quote["character"])?>">
            <span class="quote-text"><?=$quote["quote"]; ?></span>
            <span class="quote-author">-<?=$quote["character"]; ?></span>

          </li>
        <?php endforeach;?>
      </ul>
    </div>
  </body>
</html>
