<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Swap's Calculator</title>
  <style>
    * {
      margin: 0px;
      padding: 0px;
    }

    body {
      height: 90vh;
      background: #00b4e6;
    }

    .keyssection button {
      padding: 6px 10px;
      font-size: medium;
      border-radius: 3px;
      margin: 2px;
    }

    .keyssection {

      width: fit-content;
      margin: auto;
      position: relative;
      top: 30vh;
      padding: 20px;
      border: 1px solid;
      border-radius: 8px;
      background-color: rgba(124, 124, 124, 0.897) ;
      box-shadow: 3px 4px rgba(0, 0, 0, 0.8) ;
    }

    #ans {
      height: 20px;
      border: 1px solid black;
      width: auto;
      border-radius: 4px;
      margin: 10px 0;
      background-color: aliceblue;
      padding: 3px 5px;
      font-weight: 600;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;


    }

    #operations {
      display: flex;
      flex-direction: column;
      width: fit-content;
      margin: 0 0px 0 10px;
      /* float: right; */
      /* margin-left: auto; */
      /* margin-right: auto; */
    }

    #emptybtn {
      display: flex;
      margin: 10px;
      justify-content: space-between;
    }
    #head{
      text-align: center;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
  </style>
</head>

<body>
  <div class="outsidebox">
    <div class="displaybox">
      <!-- <input type="text" id="display"> -->
    </div>
    <div class="keyssection">
      <h2 id="head">Swap's <br> Calculator</h2>
      <div id="ans"></div>
      <div id="emptybtn">
        <button type="button" onclick="operation2()" value="C">C</button>
        <button type="button" onclick="cut()" value="=">X</button><br>
        <button type="button" onclick="solve()" value="=">ANS</button>
      </div>
      <div style="display: flex;">

        <div id="nums">

          <button type="button" onclick="operation(this.value)" value="1">1</button>
          <button type="button" onclick="operation(this.value)" value="2">2</button>
          <button type="button" onclick="operation(this.value)" value="3">3</button><br>

          <button type="button" onclick="operation(this.value)" value="4">4</button>
          <button type="button" onclick="operation(this.value)" value="5">5</button>
          <button type="button" onclick="operation(this.value)" value="6">6</button><br>

          <button type="button" onclick="operation(this.value)" value="7">7</button>
          <button type="button" onclick="operation(this.value)" value="8">8</button>
          <button type="button" onclick="operation(this.value)" value="9">9</button><br>
          <button type="button" onclick="operation(this.value)" value="0" style="display:block;margin:auto">0</button>
        </div>
        <div id="operations">
          <button type="button" onclick="operation(this.value)" value="*">x</button>
          <button type="button" onclick="operation(this.value)" value="+">+</button>
          <button type="button" onclick="operation(this.value)" value="-">-</button>
          <button type="button" onclick="operation(this.value)" value="/">÷</button>
        </div>
      </div>
    </div>

  </div>
  <script>


function operation(event) {
   let  show=document.getElementById('ans');
//    let  show=document.getElementById('display').value;
   show.innerText += event;
   console.log(event);
   
//   alert(event.target.value);

}
function operation2() {
   let  show=document.getElementById('ans');
//    let  show=document.getElementById('display').value;
   show.innerText = ' ';

//   alert(event.target.value);

}
function cut() {
   let  show=document.getElementById('ans').innerText;
//    let  show=document.getElementById('display').value;
console.log(show);
let cut2= show.toString();
console.log(cut2);
let len = show.length;
console.log(len);
let ans2 = cut2.slice(0,len-1);
console.log(ans2);
document.getElementById('ans').innerText=  ans2;
//   alert(event.target.value);

}

const answer = document.getElementById('display');
function solve(){

   const final = eval(show=document.getElementById('ans').innerText);
   console.log(final);
   let  dom =document.getElementById('ans');
   dom.innerText = final;
}

  </script>

</body>

</html>