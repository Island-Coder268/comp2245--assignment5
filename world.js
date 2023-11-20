var country = document.getElementById('country').value;
var url = 'world.php?country=' + country + '&lookup=cities';

fetch(url)
  .then(function(response) {
    if (response.ok) {
      return response.text();
    } else {
      throw new Error('Error fetching data');
    }
  })
  .then(function(data) {
    document.getElementById('result').innerHTML = data;
  })
  .catch(function(error) {
    console.error('Error:', error);
  });

document.getElementById('lookup-cities').addEventListener('click', function() {
  fetch(url)
    .then(function(response) {
      if (response.ok) {
        return response.text();
      } else {
        throw new Error('Error fetching data');
      }
    })
    .then(function(data) {
      document.getElementById('result').innerHTML = data;
    })
    .catch(function(error) {
      console.error('Error:', error);
    });
});
