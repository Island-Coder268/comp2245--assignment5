// world.js

document.getElementById('lookup').addEventListener('click', function() {
    var country = document.getElementById('country').value;
    var url = 'world.php?country=' + country;
  
    fetch(url)
      .then(function(response) {
        return response.text();
      })
      .then(function(data) {
        document.getElementById('result').innerHTML = data;
      });
  });
