<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="/css/styles.css">
<script src="/js/script.js"></script>
</head>
<title></title>
<body>
<div class="w3-container w3-deep-orange">
  <h1>GofL</h1>
</div>
<div class="w3-row">
  <div class="w3-col m4 l3">
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
          <button id="btn-create-field" class="w3-button w3-teal">Create</button>
    </div>
  </div>
  <div class="w3-col m8 l9 w3-border table-wrap" style="padding-top: 20px;padding-bottom: 20px;text-align: center;">
    <table id="table-field" border="1" style="">
      <!-- <tr>
        <td id="00">0</td>
        <td id="01">0</td>
        <td id="02">0</td>
        <td id="03">0</td>
        <td id="04">0</td>
      </tr>
      <tr>
        <td id="10">0</td>
        <td id="11">0</td>
        <td id="12">0</td>
        <td id="13">0</td>
        <td id="14">0</td>
      </tr>
      <tr>
        <td id="20">0</td>
        <td id="21" class="active">1</td>
        <td id="22" class="active">1</td>
        <td id="23" class="active">1</td>
        <td id="24">0</td>
      </tr>
      <tr>
        <td id="30">0</td>
        <td id="31">0</td>
        <td id="32">0</td>
        <td id="33">0</td>
        <td id="34">0</td>
      </tr>
      <tr>
        <td id="40">0</td>
        <td id="41">0</td>
        <td id="42">0</td>
        <td id="43">0</td>
        <td id="44">0</td>
      </tr> -->
    </table>
  </div>
</div>



	<div class="fieldwrap">

	</div>

	<button id="evolve-btn" class="evolve-btn">Start</button>
</body>
</html>
