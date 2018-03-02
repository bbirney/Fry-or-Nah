function putPicture(data, output) {
  document.getElementById(output).innerHTML = "<img class=\"text-center\" src=\""+data+"\"alt=\"window.location.reload()\"><br>";
  updateForm(data);
}

function updateForm(data) {
  var temp = data.split("/");
  var alpha = temp[temp.length-1];
  alpha = alpha.replace(".jpg","");
  console.log(alpha);
  document.getElementById("yes").onclick = new Function("universalAjax(null, putPicture, 'api/fry/"+alpha+"', 'post', 'output1')");
  document.getElementById("no").onclick = new Function("universalAjax(null, putPicture, 'api/nah/"+alpha+"', 'post', 'output1')");
}

function universalAjax(form, func, action = '', method = 'post', output = 'output') {
  var xhttp = new XMLHttpRequest();
  if (form != null) {
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(xhttp.response);
        console.log(data);
        func(data, output);
      }
    };
    xhttp.open(form.method, form.action, true);
    xhttp.send(new FormData(form));

  } else {
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(xhttp.response);
        console.log(data);
        func(data, output);
      }
    };
    xhttp.open(method, action, true);
    xhttp.send(null);

  }

  return false;
}
