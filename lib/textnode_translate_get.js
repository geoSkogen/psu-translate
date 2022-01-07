function translate_text(str_arr, lang, dom_els) {

  function restore_textvals(dom_els, new_strs) {
    for (i = 0; i < dom_els.length; i++) {
      dom_els[i].value = new_strs[i]
    }
  }

  const xhttp = new XMLHttpRequest()
  var query_string = '?lang=' + lang
  var resp
  if (str_arr.length > 1) {
    for (let i = 0; i < str_arr.length; i++) {
      query_string += '&content_' + i.toString() + '=' + str_arr[i]
    }
  } else {
    query_string += '&content=' + str_arr[0]
  }

  xhttp.open("GET", "http://localhost/psu-translate/translation-service/index.php" + query_string, true)
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhttp.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText)
      if (JSON.parse(this.responseText)) {

        resp = JSON.parse(this.responseText)

        if (resp['error']) {

          alert('error:' + JSON.parse(resp)['error'])
        } else {
          if (Array.isArray(resp) && resp.length) {

            restore_textvals(dom_els, resp)

          } else {
            alert('the translation server sent an empty response')
          }
        }
      } else {
        alert('translation server error: you may be requesting an unknown language')
      }
    }
  }
  xhttp.send()
  return str_arr
}
