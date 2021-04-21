const inputs = document.querySelectorAll('input')
const form = document.querySelector('form')

form.addEventListener('submit', (event) => {
  event.returnValue = validateForm()
})

function validateForm() {
  let allFilled = true
  inputs.forEach((input) => {
    if (!input.value) {
      allFilled = false
      input.style.borderColor = 'red'
    }
  })

  if (!allFilled) {
    alert('Todos os campos precisam ser preenchidos!')
    return false
  }

  return true
}

inputs.forEach((input) => {
  input.addEventListener('change', () => {
    input.style.borderColor = 'black'
  })
})
