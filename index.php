<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="/css/styles.css">
<script src="/js/script.js"></script>
</head>
<title></title>
<body>
<div class="w3-container w3-teal">
  <h1>GofL</h1>
</div>
<div class="w3-row">
      <div class="w3-col m4 l3">
    <div class="w3-col m12">
      <div class="w3-container fieldwrap  w3-border w3-center">
            <p>Select field size:</p>
            <p>
              <label for="size-n">N:</label>
              <input id="size-n" class="w3-input w3-border" type="number" name="size-n" value=5>
            </p>
            <p>
              <label for="size-n">M:</label>
              <input id="size-m" class="w3-input w3-border" type="number" name="size-n" value=5>
            </p>
            <!-- <button id="btn-create-field" class="w3-button w3-teal">Create</button> -->
      </div>
    </div>
    <div class="w3-col m12">
      <div class="w3-container fieldwrap  w3-border w3-center">
            <p>Select starting pattern:</p>
            <p>
                <select id="pattern-select" class="" name="">
                    <option value="blinker">Blinker</option>
                    <option value="toad">Toad</option>
                    <option value="beacon">Beacon</option>
                    <option value="glider">Glider</option>
                </select>
            </p>
      </div>
    </div>
    <div class="w3-col m12">
      <div class="w3-container fieldwrap  w3-border w3-center">
            <button id="evolve-btn" class="w3-button w3-teal evolve-btn">Start</button>
      </div>
    </div>
  </div>
  <div class="w3-col m8 l9 w3-border table-wrap" style="padding-top: 20px;padding-bottom: 20px;text-align: center;">
    <table id="table-field" border="1" style="">
    </table>
  </div>
</div>



	<div class="fieldwrap">

	</div>

	<!-- <button id="evolve-btn" class="evolve-btn">Start</button> -->
</body>
</html>
