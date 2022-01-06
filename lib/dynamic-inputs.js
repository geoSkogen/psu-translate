const numerator_input = document.querySelector('#input-count')
const textarea_container = document.querySelector('#content-wrapper')

function create_input_field(int) {
  const textarea = document.createElement('textarea')
  const label = document.createElement('label')
  const field = document.createElement('div')
  const id_str = 'content_' + int.toString()
  textarea.setAttribute('name', id_str)
  textarea.className = 'content-text'
  textarea.id = id_str
  label.setAttribute('for',id_str)
  label.appendChild( document.createTextNode(id_str.replace('_',' ')))
  field.className = 'content-field'

  field.appendChild(label)
  field.appendChild(document.createElement('br'))
  field.appendChild(textarea)

  return field
}


numerator_input.addEventListener('input', function (event) {
  let current_field_count = document.querySelectorAll('.content-text').length
  let new_field_count = Number(event.target.value)

  if (current_field_count) {
    document.querySelector('.content-text').setAttribute('name','content_0')
  } else {
    document.querySelector('.content-text').setAttribute('name','content')
  }
  if (new_field_count) {
    if (new_field_count > current_field_count) {

      for (let i = current_field_count; i < new_field_count; i++) {
         let field = create_input_field(i)
         textarea_container.appendChild(field)
      }
    } else if (new_field_count < current_field_count) {

      let fields = document.querySelectorAll('.content-field')

      for (let i = current_field_count; i > new_field_count; i--) {
         textarea_container.removeChild(fields[i-1])
      }
    } else {
      return
    }
  }
})
