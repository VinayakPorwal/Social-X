var input = document.querySelector('.input_text');
var main = document.querySelector('#name');
var temp = document.querySelector('.temp');
var desc = document.querySelector('.desc');
var clouds = document.querySelector('.clouds');
var button = document.querySelector('.submit');


button.addEventListener('click', function (name) {
  // windows.location.reload(true);

  fetch('https://api.openweathermap.org/data/2.5/weather?q=' + input.value + '&appid=75604dabe1d443f2296dedb386f124a4')
    .then(response => response.json())
    .then(data => {
      var tempValue = data['main']['temp'];
      var nameValue = data['name'];
      var descValue = data['weather'][0]['description'];
      var cloudValue = data['clouds']['all'];
      var celsius = (tempValue - 273.15);
      var celsius = Math.round(celsius * 100) / 100;

      main.innerHTML = nameValue;
      desc.innerHTML = "Desc - " + descValue;
      temp.innerHTML = "Temp - " + celsius + "°C";
      clouds.innerHTML = "Clouds - " + cloudValue;
      input.value = "";
      console.log(data);
    })

    .catch(err => alert("Wrong cittty name!"));
})


