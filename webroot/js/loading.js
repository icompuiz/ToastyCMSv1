var opts = {
  lines: 8, // The number of lines to draw
  length: 40, // The length of each line
  width: 9, // The line thickness
  radius: 10, // The radius of the inner circle
  color: '#000', // #rgb or #rrggbb
  speed: 1, // Rounds per second
  trail: 93, // Afterglow percentage
  shadow: true // Whether to render a shadow
};
var target = document.getElementById('loading');
var spinner = new Spinner(opts).spin(target);